<!-- Barra de salas -->
<div class="item_bot col white" style="width:98%;height:83vh;margin:0;padding:0; overflow:auto;">

    <!-- Pesquisa -->
    <div class="input-field col l10 offset-l1 s12">
        <i class="material-icons prefix">search</i>
        <input type="text" name="search" id="search">
        <label for="search">Pesquisa</label>
    </div>
    <!-- Fim da Pesquisa -->

    <!-- Lista de salas -->
    <h4>&nbsp;Não Cadastrada</h4>
    <div id="a_lista" class="col s12 white">
        <table>
            <thead>
                <tr>
                    <th>Código - Nome</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php 
                    // include_once("../functions/exibir_turmas.php");
                    include_once("../functions/exibir_professor_sala_materia.php");
                    include_once("../functions/exibir_tarefas.php");
                    // $query_m = exibir_turmas(3);
                    $query_m = exibir_professor_sala_materia(3,$_SESSION["cd_login"]);
                    $array_tarefas = exibir_tarefas(3,$row->cd_atividade);

                    if(!empty($query_m)){
                        while($row_m = $query_m->fetch_object()){
                            $dt = explode('-',$row_m->dt_turma);
                            $dt = $dt[0];
                            $row_m->dt_turma = $dt;

                            $exibir = $row_m->cd_turma." - ".$row_m->nm_sala." de ".$row_m->dt_turma;
                            if(in_array($exibir,$array_tarefas)){

                            }else{

                                ?>
                                <tr id="<?php echo "t_tr".$row_m->cd_turma; ?>" class="search_item">
                                    <td class="turma_td">
                                        <?php echo $exibir; ?>
                                        <a class="btn-floating right" href="editar_atividade.php?cd=<?php echo $cd."&id_turma=".$row_m->cd_turma; ?>">
                                            <i class="material-icons">send</i>
                                        </a>
                                    </td>
                                    <!-- Botão que adiciona os turmas a turma -->
                                </tr>
                                <?php
                                
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <!-- Lista de salas -->
    <h4>&nbsp;Cadastrada</h4>
    <div id="a_lista" class="col s12 white">
        <table>
            <thead>
                <tr>
                    <th>Código - Nome</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php 
                    include_once("../functions/exibir_tarefas.php");
                    $atarefadas = exibir_tarefas(4,$row->cd_atividade);

                    if(!empty($atarefadas)){
                        while($atarefada = $atarefadas->fetch_object()){
                            $dt = explode('-',$atarefada->dt_turma);
                            $dt = $dt[0];
                            $atarefada->dt_turma = $dt;

                            $exibir = $atarefada->cd_turma." - ".$atarefada->nm_sala." de ".$atarefada->dt_turma;

                            ?>
                            <tr id="<?php echo "t_tr".$atarefada->cd_turma; ?>" class="search_item">
                                <td class="turma_td">
                                    <?php echo $exibir; ?>
                                    <a class="btn-floating right" href="editar_atividade.php?cd=<?php echo $cd."&id_turma=".$atarefada->cd_turma; ?>">
                                        <i class="material-icons">send</i>
                                    </a>
                                </td>
                                <!-- Botão que adiciona os turmas a turma -->
                            </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>
<!-- Fim da Barra de sala -->