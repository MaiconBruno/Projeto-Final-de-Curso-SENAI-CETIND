<?php 
//Importa a validação da sessão para evitar acesso via URL
include('./php/validaPagina.php');

//verifica se a pagina pertence ao nivel do usuario logado 
if ($_SESSION['Logado'] = true && $_SESSION['usuarioNiveisAcessoId'] != "2" ) { // comparação para verificar o nivel do acesso
  session_start();
  unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'],
		$_SESSION['usuarioLogin'],
		$_SESSION['usuarioSenha']
	);
  header("Location: index.php");
  $_SESSION['loginAcesso'] = "Acesso Negado!"; //mensagem exibida quando o acesso não e permitido 
   exit();
} else {
 
}

?>

<?php

//incluindo arquivo.php
include('./php/graficoAvaliadosAgente.php');
include('./php/tabela_av.php');
include('./php/tabelaavaliacao.php');
include('./php/graficoNaoAvaliadosAgente.php');
include('./php/graficoMediaAgente.php');
include('./php/graficoInteracaoAgente.php');
include('./php/graficoTotalNaoAvaliadasAgente.php');
include('./php/graficoTotalAvaliadasAgente.php');
include('./php/graficoChamadasRecebidasAgente.php');

//include('../php/tabelaavaliacao.php')
?>

<!-- Graficos JS -->
<script type="text/javascript"></script>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./css/style.css">
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Importando chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <!-- Importando bliblioteca da google Charts so chamar 1x-->
  <link rel="shortcut icon" href="https://static.wixstatic.com/media/a917a1_d8844d4baaa443a7a31eeaf9b1c214c3%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/a917a1_d8844d4baaa443a7a31eeaf9b1c214c3%7Emv2.png" type="image/png">
 
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
  <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="PROJETO FINAL DE CURSO SENAI CETIND TURMA 58271">
  <meta name="author" content="EQUIPE PFC-SENAI">
  <!-- Importando chart.js -->
  <script src="path/to/chartjs/dist/Chart.js"></script>
  <title>DASH - JCR TECNOLOGIA</title>

  <!-- Biblioteca CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <!-- import scrolling-nav.css -->
  <link href="css/scrolling-nav.css" rel="stylesheet">
  <!-- import estilos.css -->

</head>

<body>
<nav class="border-size-top fixed-top">
    <div class="header d-flex" style="background-color:white;">
      <div class="container">
        <div class="row ">
          <div class="col-md-12 d-flex justify-content-center">
            <div class="logo" style="margin-left:90px;"> <img src="./icones/LOGO.png" height="50px" width="140px" alt=""> </div>
          </div>
        </div>
      </div>
      <div class="dropdown" style="margin-right:15px;">
      <span class="nav-link zoom  text-menu  text-primary" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img width="45" height="45" src="./icones/menu.png" style="min-width:45px;"></span>
        <ul class="dropdown-menu " aria-labelledby="dropdownMenu1">
          <li class="centralizador"><a class="text-secondary"><?php echo $_SESSION['usuarioNome']; ?></a></li>
          <li class="centralizador"><a class="text-success"><?php
                                                            $acesso = '';
                                                            if ($_SESSION['usuarioNiveisAcessoId'] == 1) {
                                                              $acesso = 'ADMINISTRADOR';
                                                            } else if ($_SESSION['usuarioNiveisAcessoId'] == 2) {
                                                              $acesso = 'AGENTE';
                                                            } else if ($_SESSION['usuarioNiveisAcessoId'] == 3) {
                                                              $acesso = 'SUPERVISOR';
                                                            }
                                                            echo $acesso;
                                                            ?></a></li>
          <li class="centralizador"><a class="text-primary" href="./php/sair.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="row  ">
    <div class="page-content col-md-9 " style="padding-top:1px; background-color:#e6f5ff">
      <!-- div da pagina toda -->
      <div class="row ">
        <div class="col-md-12 ">
          <div class="row">
            <!-- Aqui começa o primeiro card-->
            <div class="col-md-7 ">
              <div class="box-one">
              <div class="content-box-header d-flex justify-content-between align-items-center" style="padding-bottom:1;">
                <div class="dropdown ">
                      <span style="padding:3;" class="nav-link  text-menu zoom text-primary" id="dropdownGrafico" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img height="25" width="25" src="./icones/filtro.png" style="padding:1px;"></span>
                      <ul class="dropdown-menu " aria-labelledby="dropdownGrafico">
                        <li>
                          <form name="formPesquisa" class="form-inline col-md-12 col-sm-12 col-xs-12 " action=" <?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validaForm(this);">

                            <select class="form-control radio col-md-12 col-sm-6 col-xs-12" id="filtroTipo" name="opcaoAnoTotalChamadas">
                              <option value="padrao">Selecione o ano...</option>
                              <?php while ($dado_gr_cr_ano = $resultado_gr_cr_ano->fetch_array()){  ?>              
                              <option value="<?php echo $dado_gr_cr_ano['ano'] ?>"><?php echo $dado_gr_cr_ano['ano'] ?></option>
                              <?php } ?>
                            </select>
                           
                            <button type="submit" class="form-control radio btn-outline-info col-md-12 col-sm-12 col-xs-12">Buscar</button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  <div class="panel-title">Total Geral de atendimentos</div>
                </div>
                <div class="content-box-large box-with-header">
                  <div><?php echo $mensagem_erro_contarLigacoes ?></div>
                  <canvas id="G_ligacao"></canvas>
                  <script>
                    new Chart(document.getElementById("G_ligacao"), {
                      type: 'line',
                      data: {
                        labels: ["<?php echo $array_mes[0] ?>", "<?php echo $array_mes[1] ?>", "<?php echo $array_mes[2] ?>", "<?php echo $array_mes[3] ?>", "<?php echo $array_mes[4] ?>", "<?php echo $array_mes[5] ?>", "<?php echo $array_mes[6] ?>", "<?php echo $array_mes[7] ?>", "<?php echo $array_mes[8] ?>", "<?php echo $array_mes[9] ?>", "<?php echo $array_mes[10] ?>", "<?php echo $array_mes[11] ?>"],
                        datasets: [{
                          backgroundColor: ["#EBD603"],
                          fill: false,
                          borderColor: "#EBD603",
                          data: ["<?php echo $array_mes_contarLigacoes[1] ?>", "<?php echo $array_mes_contarLigacoes[2] ?>", "<?php echo $array_mes_contarLigacoes[3] ?>", "<?php echo $array_mes_contarLigacoes[4] ?>", "<?php echo $array_mes_contarLigacoes[5] ?>", "<?php echo $array_mes_contarLigacoes[6] ?>", "<?php echo $array_mes_contarLigacoes[7] ?>", "<?php echo $array_mes_contarLigacoes[8] ?>", "<?php echo $array_mes_contarLigacoes[9] ?>", "<?php echo $array_mes_contarLigacoes[10] ?>", "<?php echo $array_mes_contarLigacoes[11] ?>", "<?php echo $array_mes_contarLigacoes[12] ?>", ]
                        }]
                      },
                      options: {
                        "scales": {
                            "yAxes": [{
                              "ticks": {
                                "beginAtZero": true
                              }
                            }]
                          },
                        animation: {
                          easing: "easeInOutCirc", //easeOutBack,easeInOutCirc,easeOutCirc,easeOutExpo,easeInOutQuint,easeInQuint
                          animateScale: true,
                          animateRotate: true
                        },
                        legend: {
                          display: false
                        }

                      }
                    });

                    let mensagem_erro_contarLigacoes = "<?php echo $mensagem_erro_contarLigacoes; ?>";
                      let G_ligacao = document.getElementById("G_ligacao");
                      if (mensagem_erro_contarLigacoes != '') {
                        G_ligacao.style.display = "none";
                    }
                  </script>
                </div>
              </div>
              <div class="box-one">
              <div class="content-box-header d-flex justify-content-between align-items-center" style="padding-bottom:1;">
                  <div class="dropdown ">
                    <span style="padding:3;" class="nav-link  text-menu zoom text-primary" id="dropdownGrafico" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img height="25" width="25" src="./icones/filtro.png" style="padding:1px;"></span>
                    <ul class="dropdown-menu " aria-labelledby="dropdownGrafico">
                      <li>
                        <form id="formBusca" name="formPesquisa" class="form-inline col-md-12 col-sm-12 col-xs-12 " action=" <?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validaFormGrAvaliadasNaoAvaliadas(this);">

                            <select class="form-control radio col-md-12 col-sm-6 col-xs-12" id="filtroTipo" name="opcaoAvaliadasNaoAvalidasAno">
                              <option value="padrao">Selecione o ano...</option>
                              <?php while ($dado_gr_avaliadas_ano = $resultado_gr_avaliadas_ano->fetch_array()){  ?>              
                              <option value="<?php echo $dado_gr_avaliadas_ano['ano'] ?>"><?php echo $dado_gr_avaliadas_ano['ano'] ?></option>
                              <?php } ?>
                            </select>

                          <select class="form-control radio col-md-12 col-sm-6 col-xs-12" id="filtroTipo" name="opcaoAvaliadasNaoAvalidasMes">
                            <option value="padrao">Selecione o Mes...</option>
                            <option value="1">Janeiro</option>
                            <option value="2">Fevereiro</option>
                            <option value="3">Março</option>
                            <option value="4">Abril</option>
                            <option value="5">Maio</option>
                            <option value="6">Junho</option>
                            <option value="7">Julho</option>
                            <option value="8">Agosto</option>
                            <option value="9">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                          </select>

                          <button type="submit" class="form-control radio btn-outline-info col-md-12 col-sm-12 col-xs-12">Buscar</button>
                        </form>
                      </li>
                    </ul>
                  </div>
                  <div class="panel-title">Cálculo geral de avaliadas e não avalidas</div>
                </div>
                <div class="content-box-large box-with-header">
                  <div id="msgErroGrAvaliadasNaoAvaliadas">Nenhum resultado encontrado!</div>
                  <canvas id="G_ligacaoN" height="155"></canvas>
                  <script>
                    new Chart(document.getElementById("G_ligacaoN"), {
                      type: 'line',
                      data: {
                        labels: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
                        datasets: [{
                            backgroundColor: ["#006400"],
                            label: "Avaliadas",
                            fill: false,
                            borderColor: "#006400",
                            data: ["<?php echo $array_gr_avaliadas[0] ?>", "<?php echo $array_gr_avaliadas[1] ?>", "<?php echo $array_gr_avaliadas[2] ?>", "<?php echo $array_gr_avaliadas[3] ?>", "<?php echo $array_gr_avaliadas[4] ?>", "<?php echo $array_gr_avaliadas[5] ?>", "<?php echo $array_gr_avaliadas[6] ?>"]
                          },
                          {
                            backgroundColor: ["#FF4436"],
                            fill: false,
                            label: "Não Avaliadas",
                            borderColor: "#FF4436",
                            data: ["<?php echo $array_gr_naoavaliadas[0] ?>", "<?php echo $array_gr_naoavaliadas[1] ?>", "<?php echo $array_gr_naoavaliadas[2] ?>", "<?php echo $array_gr_naoavaliadas[3] ?>", "<?php echo $array_gr_naoavaliadas[4] ?>", "<?php echo $array_gr_naoavaliadas[5] ?>", "<?php echo $array_gr_naoavaliadas[6] ?>", ]
                          }
                        ]
                      },
                      options: {
                        "scales": {
                            "yAxes": [{
                              "ticks": {
                                "beginAtZero": true
                              }
                            }]
                          },
                        animation: {
                          easing: "easeInOutCirc", //easeOutBack,easeInOutCirc,easeOutCirc,easeOutExpo,easeInOutQuint,easeInQuint
                          animateScale: true,
                          animateRotate: true
                        }
                      }
                    });

                    let verificaErroNaoAvaliadas = "<?php echo $verificaErroNaoAvaliadas; ?>";
                    let verificaErroAvaliadas = "<?php echo $verificaErroAvaliadas; ?>";
                    let msgErroGrAvaliadasNaoAvaliadas = document.getElementById("msgErroGrAvaliadasNaoAvaliadas");
                    let G_ligacaoN = document.getElementById("G_ligacaoN");
                      if (verificaErroNaoAvaliadas == 1 && verificaErroAvaliadas == 1) {
                        G_ligacaoN.style.display = "none";
                        msgErroGrAvaliadasNaoAvaliadas.style.display = "block";
                    }else{
                        G_ligacaoN.style.display = "block";
                        msgErroGrAvaliadasNaoAvaliadas.style.display = "none";
                    }
                  </script>
                </div>
              </div>
            </div>

            <!-- Aqui termina o primeiro card-->
            <div class="col-md-5">
              <!-- Aqui começa o segundo card-->
              <div class="row">
                <div class="col-md-12">
                  <div class=" content-box-header">                   
                    <div class="panel-title d-flex justify-content-between " align="center">Seu ranking de interação:</div>  
                  </div>
                  <div class="content-box-large box-with-header">
                    <div><?php echo $mensagem_erro_interacao ?></div>
                    <canvas id="G-interacao" height="200"></canvas>
                    <script>
                      new Chart(document.getElementById("G-interacao"), {
                        type: 'horizontalBar',
                        data: {
                          labels: ["Facebook", "WhatsApp", "Skype", "E-mail", "Telefone", "Chat"],
                          datasets: [{
                            backgroundColor: ["#304CFF", "#B2FF82", "#27C4CC", "#FF5951", "#EBD603", "#8A21F0"],
                            data: ["<?php echo $dado_interacao[1] ?>", "<?php echo $dado_interacao[2] ?>", "<?php echo $dado_interacao[3] ?>", "<?php echo $dado_interacao[4] ?>", "<?php echo $dado_interacao[5] ?>", "<?php echo $dado_interacao[6] ?>", ]
                          }],
                        },
                        options: {
                          "scales": {
                            "xAxes": [{
                              "ticks": {
                                "beginAtZero": true
                              }
                            }]
                          },
                          responsive: true,
                          title: {
                            display: false,
                          },
                          animation: {
                            easing: "easeInQuad",
                            animateScale: true,
                            animateRotate: true
                          },
                          legend: {
                            display: false,
                          }
                        }
                      });

                      let mensagem_erro_interacao = "<?php echo $mensagem_erro_interacao; ?>";
                      let grInteracao = document.getElementById("G-interacao");
                      if (mensagem_erro_interacao != '') {
                        grInteracao.style.display = "none";
                      }
                    </script>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-12">
                  <div class="content-box-header">
                    <div class="panel-title">Sua média de avaliações:</div>
                  </div>
                  <div class="content-box-large box-with-header">
                    <div><?php echo $mensagem_erro_media ?></div>
                    <canvas id="G-mediaRespondidas" height="250"></canvas>
                    <script>
                      new Chart(document.getElementById("G-mediaRespondidas"), {
                        type: 'bar',
                        data: {
                          labels: ["R1", "R2", "R3", "R4", "R5"],
                          datasets: [{
                            backgroundColor: ["#FFFF00", "#00008B", "#8B4513", "#008000", "#FF0000"],
                            data: [<?php echo $r1_gr_media ?>, <?php echo $r2_gr_media ?>, <?php echo $r3_gr_media ?>, <?php echo $r4_gr_media ?>, <?php echo $r5_gr_media ?>],
                          }],
                        },
                        options: {
                          "scales": {
                            "yAxes": [{
                              "ticks": {
                                "beginAtZero": true
                              }
                            }]
                          },
                          responsive: true,
                          legend: {
                            display: false,
                          },
                          title: {
                            display: false,
                          },

                          animation: {
                            easing: "easeInOutCirc", //easeOutBack,easeInOutCirc,easeOutCirc,easeOutExpo,easeInOutQuint,easeInQuint
                            animateScale: true,
                            animateRotate: true
                          },
                        }
                      });

                      let mensagem_erro_media = "<?php echo $mensagem_erro_media; ?>";
                      let grMedia = document.getElementById("G-mediaRespondidas");
                      if (mensagem_erro_media != '') {
                        grMedia.style.display = "none";
                      }
                    </script>
                    <!-- <div class="mt-4 text-center small"> <span class="mr-2"> <i class="fas fa-circle text-primary"></i> Direct </span> <span class="mr-2"> <i class="fas fa-circle text-success"></i> Social </span> <span class="mr-2"> <i class="fas fa-circle text-info"></i> Referral </span> <span class="mr-2"> <i class="fas fa-circle text-success"></i> Social </span> <span class="mr-2"> <i class="fas fa-circle text-info"></i> Referral </span> </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 " style=" background-color:#e6f5ff; padding-top:10px; padding-right:20px; min-height:750px;">
      <!-- Aqui começa o segundo card-->
      <div class="row">
        <div class="col-md-12">
          <div class="content-box-header col-md-12">
            <div class="panel-title col-md-12">Suas avaliações respondidas:</div>
          </div>
          <div class="content-box-large box-with-header">
            <div><?php echo $mensagem_erro_avaliadas ?></div>
            <canvas id="G-Respondidas" height="295px"></canvas>
            <script>
              new Chart(document.getElementById("G-Respondidas"), {
                type: 'pie',
                data: {
                  labels: ["R1", "R2", "R3", "R4", "R5"],
                  datasets: [{
                    backgroundColor: ["#FFFF00", "#00008B", "#8B4513", "#008000", "#FF0000"],
                    data: [<?php echo $resposta1 ?>, <?php echo $resposta2 ?>, <?php echo $resposta3 ?>, <?php echo $resposta4 ?>, <?php echo $resposta5 ?>],
                  }],
                },
                options: {
                  
                  responsive: true,
                  legend: {
                    position: 'bottom',
                    labels: {

                      boxWidth: 13,
                      fontSize: 13,

                    },
                  },
                  title: {
                    display: false,
                  },

                  animation: {
                    easing: "easeInOutCirc", //easeOutBack,easeInOutCirc,easeOutCirc,easeOutExpo,easeInOutQuint,easeInQuint
                    animateScale: true,
                    animateRotate: true
                  },
                }
              });

              let mensagem_erro_avaliadas = "<?php echo $mensagem_erro_avaliadas; ?>";
              let grAvaliadas = document.getElementById("G-Respondidas");
              if (mensagem_erro_avaliadas != '') {
                grAvaliadas.style.display = "none";
              }
            </script>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="content-box-header col-md-12 col-sm-12 col-xs-12 ">
            <div class="panel-title col-md-12 col-sm-12 col-xs-12">Suas avaliações sem respostas:</div>
          </div>
          <div class="content-box-large box-with-header">
            <div><?php echo $mensagem_erro_naoAvaliados ?></div>
            <canvas id="G-naorespondidas" height="300px"></canvas>
            <script>
              new Chart(document.getElementById("G-naorespondidas"), {
                type: 'pie',
                data: {
                  labels: ["R1", "R2", "R3", "R4", "R5"],
                  datasets: [{
                    backgroundColor: ["#FFFF00", "#00008B", "#8B4513", "#008000", "#FF0000"],
                    data: [<?php echo $resposta1_na ?>, <?php echo $resposta2_na ?>, <?php echo $resposta3_na ?>, <?php echo $resposta4_na ?>, <?php echo $resposta5_na ?>],
                  }],
                },
                options: {
                  responsive: true,
                  legend: {
                    position: 'bottom',
                    labels: {
                      boxWidth: 13,
                      fontSize: 13,

                    },
                  },
                  title: {
                    display: false,
                  },

                  animation: {
                    easing: "easeInOutCirc", //easeOutBack,easeInOutCirc,easeOutCirc,easeOutExpo,easeInOutQuint,easeInQuint
                    animateScale: true,
                    animateRotate: true
                  },
                }
              });

              let mensagem_erro_naoAvaliados = "<?php echo $mensagem_erro_naoAvaliados; ?>";
              let grNaoAvaliadas = document.getElementById("G-naorespondidas");
              if (mensagem_erro_naoAvaliados != '') {
                grNaoAvaliadas.style.display = "none";
              }
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="d-flex tabelas-fixo">
    <div class=" zoom pd ">
      <a href="./TabelaDoAgente.php">
        <img class="img-responsive" src="./icones/tabela.png" width="35px" height="35px" alt="Tabelas" />
      </a>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="copy text-center"> Copyright 2019 <a href='#'>Dashboard de Qualidade JCR </a> </div>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>
  <!-- Importando avaliacao.js -->
  <script src="../js/avaliacao.js"></script>
  <!-- imports do Jquery -->
  <script src="./js/avaliacao.js"></script>
  <script src="./js/validacaoForm.js"></script>
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/date-eu.js"></script>
</body>

</html>