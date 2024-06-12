<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
</head>
<style type="text/css">
    table.blueTable thead {
  background: #FFFFFF;

  border-bottom: 2px solid #444444;
}
table.blueTable {
  border: 1px solid #000000;
  background-color: #FFFFFF;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  padding: 3px 2px;
  border: 1px solid black;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #FFFFFF;
}
table.blueTable td:nth-child(even) {
  background: #FFFFFF;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}

</style>
<body>
    <table class="blueTable">
        <thead>
            <tr>
                <th >
                    #
                </th>
                <th >
                    F.I.O
                </th>
                <th >
                    Viloyat
                </th>
                <th >
                    Telefon raqam
                </th>
                <th >
                    Manzil
                </th>
                
                
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp
            @foreach($petitions as $petition)
            <tr>
                <td>
                    {{ $i }}@php $i++; @endphp
                </td>
                <td>
                    {{ $petition->last_name }} {{ $petition->first_name }} {{ $petition->middle_name }}
                </td>
                <td>
                    {{ $petition->getRegion()->name_uz }}
                </td>
                <td>
                    {{ $petition->mobile_phone }}
                </td>
                <td>
                    {{ $petition->address }}
                </td>
                
            </tr>
            @endforeach
            
        </tbody>

    </table>
    
</body>
</html>