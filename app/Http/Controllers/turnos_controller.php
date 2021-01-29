<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class turnos_controller extends Controller
{
    public function getTurnos()
    {
        $ins = "set @maxId := (select max(id) + 1 from users_ejemplo.turnos);";
        DB::select($ins);

        $ins = "insert into users_ejemplo.turnos (id) values(@maxId);";
        DB::select($ins);

        $sql = 'SELECT max(id) - 1 as id FROM users_ejemplo.turnos;';
        $products = DB::select($sql);
        return $products;
    }

    public function getTurnosCajero($id)
    {
        $ins = "set @maxId := (select max(idTurno) + 1 from users_ejemplo.turnos_cajero);";
        DB::select($ins);

        $ins = "insert into users_ejemplo.turnos_cajero (idTurno, idCajero) values(@maxId, " .$id.");";
        DB::select($ins);

        $sql = 'SELECT max(idTurno) as id FROM users_ejemplo.turnos_cajero;';
        $products = DB::select($sql);
        return $products;
    }
}
