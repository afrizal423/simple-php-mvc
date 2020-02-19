<div class="container card">
  <div class="row">
    <div class="col">col</div>
    <div class="col">col</div>
    <div class="col">col</div>
    <div class="col">col</div>
  </div>
  <div class="row">
    <div class="col-8">col-8</div>
    <div class="col-4">col-4</div>
  </div>
</div>
<a class="header" href="/login/log_in">Log in</a>
<?php //echo json_encode($anu);
// $no = 0;
// while($data = $anu->fetch(\PDO::FETCH_ASSOC)){
//     $no++;
//     echo $no; }
foreach ($anu as $user) {
    echo $user['id'] . '<br />';
}
    ?>