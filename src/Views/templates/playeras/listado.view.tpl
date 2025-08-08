<h1>Registro de Playeras con Causa</h1>
<div class="right">
    <a href="index.php?page=Playeras-Form&mode=INS" class="button">Nueva Orden</a>
</div>
<section>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Causa Apoyada</th>
                <th>Talla</th>
                <th>País</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{foreach playeras}}
            <tr>
                <td>{{id}}</td>
                <td>{{nombre_cliente}}</td>
                <td>{{causa_apoyada}}</td>
                <td>{{talla}}</td>
                <td>{{pais}}</td>
                <td>
                    <a href="index.php?page=Playeras-Form&mode=DSP&id={{id}}">Ver</a> |
                    <a href="index.php?page=Playeras-Form&mode=UPD&id={{id}}">Editar</a> |
                    <a href="index.php?page=Playeras-Form&mode=DEL&id={{id}}">Eliminar</a>
                </td>
            </tr>
            {{endfor playeras}}
        </tbody>
    </table>
</section>