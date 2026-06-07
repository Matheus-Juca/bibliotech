<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">




</head>

<body>

<!DOCTYPE html>

<html lang="pt-BR">
<head>

<meta charset="UTF-8">

<style>

body{
    font-family: DejaVu Sans;
    margin:0;
    color:#1e293b;
    background:#ffffff;
}

.header{
    background:#1E3A8A;
    color:white;
    padding:25px;
    text-align:center;
}

.header h1{
    margin:0;
    font-size:24px;
}

.header p{
    margin-top:6px;
    font-size:12px;
    opacity:.9;
}

.info{
    padding:20px 30px;
    font-size:12px;
    color:#64748b;
}

.section-title{
    margin:20px 30px 10px;
    color:#1E3A8A;
    font-size:16px;
    font-weight:bold;
}

table{
    width:calc(100% - 60px);
    margin:0 30px 20px;
    border-collapse:collapse;
}

th{
    background:#E0E7FF;
    color:#1E3A8A;
    padding:10px;
    text-align:left;
    border:1px solid #CBD5E1;
}

td{
    padding:10px;
    border:1px solid #CBD5E1;
}

tr:nth-child(even){
    background:#F8FAFC;
}

.resumo{
    width:calc(100% - 60px);
    margin:0 30px 25px;
}

.card{
    width:48%;
    display:inline-block;
    border:1px solid #E2E8F0;
    padding:12px;
    margin-bottom:10px;
    border-radius:6px;
    background:#F8FAFC;
}

.card-title{
    font-size:11px;
    color:#64748B;
}

.card-value{
    font-size:20px;
    font-weight:bold;
    color:#1E3A8A;
    margin-top:4px;
}

.footer{
    margin-top:40px;
    text-align:center;
    font-size:10px;
    color:#94A3B8;
}

.destaque{
    color:#16A34A;
    font-weight:bold;
}

.alerta{
    color:#DC2626;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="header">


<h1>BIBLIOTECH JMPR</h1>

<p>
    Sistema de Gerenciamento da Biblioteca Escolar
</p>

<p>
    EEMTI José Maria Pontes da Rocha
</p>


</div>

<div class="info">


Relatório emitido em:
{{ now()->format('d/m/Y H:i') }}


</div>

<div class="section-title">
    Resumo Geral
</div>

<div class="resumo">


<div class="card">
    <div class="card-title">Alunos cadastrados</div>
    <div class="card-value">{{ $alunos }}</div>
</div>

<div class="card">
    <div class="card-title">Livros cadastrados</div>
    <div class="card-value">{{ $livros }}</div>
</div>

<div class="card">
    <div class="card-title">Empréstimos do mês</div>
    <div class="card-value">{{ $emprestimosMes }}</div>
</div>

<div class="card">
    <div class="card-title">Livros devolvidos</div>
    <div class="card-value destaque">{{ $devolvidos }}</div>
</div>

<div class="card">
    <div class="card-title">Livros emprestados</div>
    <div class="card-value">{{ $emprestados }}</div>
</div>

<div class="card">
    <div class="card-title">Livros em atraso</div>
    <div class="card-value alerta">{{ $atrasados }}</div>
</div>


</div>

<div class="section-title">
    Indicadores da Biblioteca
</div>

<table>


<tr>
    <th>Indicador</th>
    <th>Resultado</th>
</tr>

<tr>
    <td>Taxa de devolução</td>
    <td>
        {{ ($devolvidos + $emprestados) > 0 ? round(($devolvidos / ($devolvidos + $emprestados)) * 100, 1) : 0 }}%
    </td>
</tr>

<tr>
    <td>Taxa de atraso</td>
    <td>
        {{ ($devolvidos + $emprestados) > 0 ? round(($atrasados / ($devolvidos + $emprestados)) * 100, 1) : 0 }}%
    </td>
</tr>

<tr>
    <td>Média de empréstimos por aluno</td>
    <td>
        {{ $alunos > 0 ? round($emprestimosMes / $alunos, 2) : 0 }}
    </td>
</tr>


</table>

<div class="section-title">
    Ranking dos Livros Mais Emprestados
</div>

<table>


<tr>
    <th>Posição</th>
    <th>Livro</th>
    <th>Total de Empréstimos</th>
</tr>

@foreach($maisLidos as $index => $livro)

<tr>

    <td>
        {{ $index + 1 }}º
    </td>

    <td>
        {{ $livro->livro->titulo }}
    </td>

    <td>
        {{ $livro->total }}
    </td>

</tr>

@endforeach

</table>

<div class="footer">


Bibliotech JMPR • Sistema de Gestão da Biblioteca Escolar

<br><br>

Relatório gerado automaticamente pelo sistema.


</div>

</body>
</html>


</body>
</html>