<?php
include ('./php/conexao.php');

$agente = $_SESSION['usuarioNome'];
$mensagem_erro_granaovaliadas = '';

$mes = filter_input(INPUT_GET, "opcaoAvaliadasNaoAvalidasMes");
$ano = filter_input(INPUT_GET, "opcaoAvaliadasNaoAvalidasAno");

if($ano == null){
    $ano = date('Y');
}

if($mes == null){
    $mes = date('n');
}

$num_semana = 0;
$select_gr_naoavaliadas = "call pfc_db.select_gr_naoavalidas_agente('$num_semana', '$agente', '$mes', '$ano');";
$resultado_gr_naoavaliadas = mysqli_query($conn, $select_gr_naoavaliadas);

while($dado_gr_naoavaliadas = $resultado_gr_naoavaliadas -> fetch_array()){  
    $array_gr_naoavaliadas[$num_semana] = $dado_gr_naoavaliadas['qtd_ligacoes'];  
}

?>

<?php
include ('./php/conexao.php');

$num_semana = 1;
$select_gr_naoavaliadas = "call pfc_db.select_gr_naoavalidas_agente('$num_semana', '$agente', '$mes', '$ano');";
$resultado_gr_naoavaliadas = mysqli_query($conn, $select_gr_naoavaliadas);

while($dado_gr_naoavaliadas = $resultado_gr_naoavaliadas -> fetch_array()){  
    $array_gr_naoavaliadas[$num_semana] = $dado_gr_naoavaliadas['qtd_ligacoes'];  
}
?>

<?php
include ('./php/conexao.php');

$num_semana = 2;
$select_gr_naoavaliadas = "call pfc_db.select_gr_naoavalidas_agente('$num_semana', '$agente', '$mes', '$ano');";
$resultado_gr_naoavaliadas = mysqli_query($conn, $select_gr_naoavaliadas);

while($dado_gr_naoavaliadas = $resultado_gr_naoavaliadas -> fetch_array()){  
    $array_gr_naoavaliadas[$num_semana] = $dado_gr_naoavaliadas['qtd_ligacoes'];  
}
?>

<?php
include ('./php/conexao.php');

$num_semana = 3;
$select_gr_naoavaliadas = "call pfc_db.select_gr_naoavalidas_agente('$num_semana', '$agente', '$mes', '$ano');";
$resultado_gr_naoavaliadas = mysqli_query($conn, $select_gr_naoavaliadas);

while($dado_gr_naoavaliadas = $resultado_gr_naoavaliadas -> fetch_array()){  
    $array_gr_naoavaliadas[$num_semana] = $dado_gr_naoavaliadas['qtd_ligacoes'];  
}
?>

<?php
include ('./php/conexao.php');

$num_semana = 4;
$select_gr_naoavaliadas = "call pfc_db.select_gr_naoavalidas_agente('$num_semana', '$agente', '$mes', '$ano');";
$resultado_gr_naoavaliadas = mysqli_query($conn, $select_gr_naoavaliadas);

while($dado_gr_naoavaliadas = $resultado_gr_naoavaliadas -> fetch_array()){  
    $array_gr_naoavaliadas[$num_semana] = $dado_gr_naoavaliadas['qtd_ligacoes'];  
}
?>

<?php
include ('./php/conexao.php');

$num_semana = 5;
$select_gr_naoavaliadas = "call pfc_db.select_gr_naoavalidas_agente('$num_semana', '$agente', '$mes', '$ano');";
$resultado_gr_naoavaliadas = mysqli_query($conn, $select_gr_naoavaliadas);

while($dado_gr_naoavaliadas = $resultado_gr_naoavaliadas -> fetch_array()){  
    $array_gr_naoavaliadas[$num_semana] = $dado_gr_naoavaliadas['qtd_ligacoes'];  
}
?>

<?php
include ('./php/conexao.php');

$num_semana = 6;
$select_gr_naoavaliadas = "call pfc_db.select_gr_naoavalidas_agente('$num_semana', '$agente', '$mes', '$ano');";
$resultado_gr_naoavaliadas = mysqli_query($conn, $select_gr_naoavaliadas);

while($dado_gr_naoavaliadas = $resultado_gr_naoavaliadas -> fetch_array()){  
    $array_gr_naoavaliadas[$num_semana] = $dado_gr_naoavaliadas['qtd_ligacoes'];  
}
?>

<?php
if($array_gr_naoavaliadas[0] == 0 && $array_gr_naoavaliadas[1] == 0 && $array_gr_naoavaliadas[2] == 0 && $array_gr_naoavaliadas[3] == 0 && $array_gr_naoavaliadas[4] == 0 && $array_gr_naoavaliadas[5] == 0 && $array_gr_naoavaliadas[6] == 0){
    $verificaErroNaoAvaliadas = 1;
}else{
    $verificaErroNaoAvaliadas = 0;
}
?>
