<!DOCTYPE html>
<html>
<head>
    <title>test1</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <div class="post" data-status="active">...</div>
    <div class="post" data-status="inactive">...</div>
    <div class="post">...</div>

    <div id="res"></div>

    <h4>Users</h4>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach

    <h4>Orders</h4>
    @foreach($orders as $order)
        <p>
            <span>{{$order->user_id}}</span>
            <span>{{$order->user_sum}}</span>
            <span>{{$order->user_count}}</span>
        </p>
    @endforeach
</body>
<script>

    /* Работа с массивами */
    var arr = [
        {
            id: 1,
            name: 'Телефон',
            price: 1000
        },
        {
            id: 2,
            name: 'Телевизор',
            price: 5000
        },
        {
            id: 3,
            name: 'Холодильник',
            price: 2500
        }
    ];

    var res = document.getElementById("res");


    //  1) Отсортировать массив по цене от большего к меньшему

    arr_sort = arr.slice();
    arr_sort.sort(function(a,b) {
        return b.price - a.price;
    });

    var res_sort = "<p>"+JSON.stringify(arr_sort)+"</p>";
    console.log(arr_sort);

    //  2) Удалить из массива элемент с названием "Телевизор"


    var arr_filter = arr.filter(function(el) {
        if(el.name != "Телевизор") return el;
    });
    res_filter = "<p>"+JSON.stringify(arr_filter)+"</p>";
    console.log(arr_filter);

    //  3) Получить массив с уникальным списком полей "name"

    var arr_map = arr.map(function(el) {
        return el.name;
    });
    res_map = "<p>"+JSON.stringify(arr_map)+"</p>";
    console.log(arr_map);

    res.innerHTML = res_sort + res_filter + res_map;

    /*jQuery*/

    //  1) Получить последний элемент с классом post

    var post_last = $(".post").last();
    console.log(post_last);
    console.log(post_last.text());

    //  2) Получить элементы, которые имеют атрибут data-status

    var status_elms =   $("[data-status]");
    console.log(status_elms);

    //  3) Повесить обработчик события "click" на элемент с data-status="active"

    $("[data-status='active']").click(function () {
        $(this).css("border","2px solid red");
    });

</script>
</html>
