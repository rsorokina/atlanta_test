<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

    }

    public function test()
    {
        //1) Получить пользователей у которых нет заказов
        $users = DB::table('users')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('orders')
                    ->whereRaw('orders.user_id = users.id');
            })
            ->get();


        //2) Получить общую сумму всех заказов + кол-во заказов для каждого пользователя со статусом 'confirmed' и отсортировать результат по кол-ву заказов

        $orders = DB::table('orders')
            ->select(DB::raw('sum(amount) as user_sum, count(*) as user_count, user_id'))
            ->where('status', 'configrmed')
            ->groupBy('user_id')
            ->orderBy('user_count')
            ->get();


        return view("test")->with(compact('users', 'orders'));
    }

}


