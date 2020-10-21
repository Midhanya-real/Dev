<?php
namespace App\http;

use App\Models\HomeModel;
use Core\Database\Database;
use Core\Database\QueryBuilder;
use Core\View;

class HomeController
{

    public static function registration(){
       $connect = HomeModel::query()->select(['Name'])->where('UserId', 2)->toSql();
       return $connect;
    }
    public static function autorization(){
        return View::render('Home.autorize',[]);
    }
}

//View::render('Home.test',['x'=>$connect]);
