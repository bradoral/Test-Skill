<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Skill</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <style>

        .input {
            display: block;
            margin: 10px;
        }
        </style>

    </head>
    <body>
    <div class="content">
        <div class="row">
        <form class="main_form" method="POST" action="/save">
            @csrf
            <label>Product Name :</label>
            <input class="input" type="text" name="product_name" >
            <label>Product Quantity :</label>
            <input class="input" type="number" name="quantity">
            <label>Product Price :</label>
            <input class="input" type="number" name="item_price">
            <input class="input" type="submit" name="submit" value="Submit" />

        </form>
        </div>
        <div class="row">
            <table>
                <thead>
                    <th>
                        Product name
                    </th>
                    <th>
                        Quantity in stock
                    </th>
                    <th>
                        Price per item
                    </th>
                    <th>
                        Datetime submitted
                    </th>
                    <th>
                        Total value
                    </th>

                </thead>
                <tbody>
                    @if(isset($maindata))
                    @foreach($maindata as $row)
                   <tr>
                       <td>
                           {{$row['product_name']}}
                       </td>
                       <td>
                            {{$row['quantity']}}
                       </td>
                       <td>

                            {{$row['item_price']}}
                    </td>
                    <td>

                            {{$row['dateTimeSubmited']}}
                    </td>
                    <td>

                            {{$row['quantity'] * $row['item_price']}}
                    </td>
                   </tr>
                   @endforeach
                   @endif
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>
