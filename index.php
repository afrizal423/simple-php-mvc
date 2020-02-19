<?php

/*
 *  Jika mengalami error pada require dir atau tidak terbaca
 *  pastinya menggunakan xampp dan sebagainya (localhost/{nama-project}) akan eror
 *  silahkan baca di link ini https://s.ilc.or.id/LBQD
 *  jika mengalami eror tersebut 
 * 
 * 
 *  Afrizal Muhammad Yasin
 *  17081010092
 *  Thanks Dawid for support me in this task
 */

require __DIR__ . '/core/app.php';

$app = new App();

$app->autoload();

$app->config();

$app->start();

?>