<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
    body{
            font-family: DejaVu Sans;
        }
		table.blueTable {
  border: 1px solid #000000;
  background-color: #FFFFFF;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #000000;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
  color: #000000;
}
table.blueTable tr:nth-child(even) {
  background: #FFFFFF;
}
table.blueTable td:nth-child(even) {
  background: #FFFFFF;
}
table.blueTable thead {
  background: #FFFFFF;
  background: -moz-linear-gradient(top, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
  background: -webkit-linear-gradient(top, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
  background: linear-gradient(to bottom, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
  border-bottom: 1px solid #000000;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #000000;
  border-left: 1px solid #000000;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #000000;
  background: #FFFFFF;
  background: -moz-linear-gradient(top, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
  background: -webkit-linear-gradient(top, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
  background: linear-gradient(to bottom, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
  border-top: 2px solid #000000;
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
</head>
<body>
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp

<h3>{{ $region->$name_l }} {{ date('Y-m-d') }}</h3>

<table class="blueTable">
<thead>
<tr>
<th>#</th>
        					<th>@lang('petition.Area')</th>
        					<th >@lang('petition.Ayollar')</th>
                            <th >@lang('petition.Erkaklar')</th>
        					<th >@lang('petition.Umumiy')</th>
</tr>
</thead>

<tbody>
@php $i=1; $um_ay = 0; $um_er = 0; $umumiy = 0;@endphp
        				@foreach($data as $item)
                    
                            <tr >
                                <td>{{ $i }}@php $i++; @endphp</td>
                                <td>{{ $item->$name_l }}</td>
                                <td >{{ $item->ayollar }}</td>
                                <td >{{ $item->erkaklar }}</td>
                                <td>@php $um = $item->ayollar + $item->erkaklar; $um_ay += $item->ayollar; $um_er += $item->erkaklar; $umumiy += $um; @endphp {{ $um }}</td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                    <tfoot>
<tr>
                            <td>
                                
                            </td>
                            <td>
                                @lang('petition.Umumiy')
                            </td>
                            <td>
                                {{ $um_ay }}
                            </td>
                            <td>
                                {{ $um_er }}
                            </td>
                            <td>
                                {{ $umumiy }}
                            </td>
                        </tr>
</tfoot>
</table>


</body>
</html>