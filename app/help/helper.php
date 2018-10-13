<?php




function uploadImage($file, $path='')
{
    $filename = $file->getClientOriginalName();
    $file->move(
        base_path().$path, $filename
    );
    return $filename;

}

function getImage($filename)
{
    $path = url('/').'/public/admin/websiteImages/';
    return asset('/admin/websiteImages/'.$filename);
}


function sitesetting($namesetting)
{
    return \App\SiteSettings::where('namesetting', $namesetting)->get()[0]->value;
}

function clientStatus()
{
    $array = [
        '0' => 'Normal customer',
        '1' => 'Permanent customer'
    ];
    return $array;
}

function stockStatus()
{
    $array = [
        '1' => 'in stock',
        '0' => 'in the route'
    ];
    return $array;
}

function clients()
{
    $client = \App\Clients::get();
    $clients = array();
    for ($i=0; $i<count($client); $i++){
        $clients += [$client[$i]->id => $client[$i]->name];
    }

    return $clients;
}

function goods()
{
    $good = \App\Stock::get();
    $goods = array();
    for ($i=0; $i<count($good); $i++){
        $goods += [$good[$i]->id => $good[$i]->goods_name];
    }

    return $goods;
}


function chartMonth($month)
{
    $data = \App\Orders::whereMonth('created_at', $month)->whereYear('created_at', date("Y"))->get();
    $count = count($data);
    return $count;
}


function countClient()
{
    $clients = count(\App\Clients::all());
    return $clients;
}


function countStock()
{
    $stock = count(\App\Stock::all());
    return $stock;
}


function totalSales()
{
    $sales = \App\Orders::sum('total');
    return $sales;
}

function getTasks()
{
    $tasks = \App\Calendar::orderBy('id', 'asc')->take(8)->get();
    return $tasks;
}

function NumOfSales()
{
    $sales = count(\App\Orders::all());
    return $sales;
}

function notifications()
{
    $quantity = \App\Stock::where('notifications', 1)->where('quantity', '<', '6')->get();
    return $quantity;
}








