<h1>{{formTitle}}</h1>
<section>
    <form action="index.php?page=Playeras-Form" method="post">
        <input type="hidden" name="mode" value="{{mode}}" />
        <input type="hidden" name="id" value="{{id}}" />

        <fieldset>
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre completo" value="{{nombre_cliente}}" {{if isReadOnly}}readonly{{endif}} />
        </fieldset>
        
        <fieldset>
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" value="{{email}}" {{if isReadOnly}}readonly{{endif}} />
        </fieldset>

        <fieldset>
            <label for="causa_apoyada">Causa a Apoyar</label>
            <input type="text" id="causa_apoyada" name="causa_apoyada" placeholder="Ej: Reforestación" value="{{causa_apoyada}}" {{if isReadOnly}}readonly{{endif}} />
        </fieldset>

        <fieldset>
            <label for="diseño_favorito">Diseño Favorito</label>
            <input type="text" id="diseño_favorito" name="diseño_favorito" placeholder="Ej: 'Planeta B'" value="{{diseño_favorito}}" {{if isReadOnly}}readonly{{endif}} />
        </fieldset>

        <fieldset>
            <label for="talla">Talla</label>
            <select name="talla" id="talla" {{if isReadOnly}}disabled{{endif}}>
                {{foreach tallas}}
                <option value="{{value}}" {{selected}}>{{text}}</option>
                {{endfor tallas}}
            </select>
        </fieldset>

        <fieldset>
            <label for="pais">País</label>
            <input type="text" id="pais" name="pais" placeholder="Ej: Honduras" value="{{pais}}" {{if isReadOnly}}readonly{{endif}} />
        </fieldset>
        
        <fieldset>
            <label for="mensaje">Mensaje Adicional</label>
            <textarea id="mensaje" name="mensaje" rows="4" {{if isReadOnly}}readonly{{endif}}>{{mensaje}}</textarea>
        </fieldset>

        <fieldset>
            {{ifnot isReadOnly}}
                <button type="submit">Guardar Orden</button>
            {{endifnot isReadOnly}}
            
            {{if showDeleteBtn}}
                <a href="index.php?page=Playeras-Delete&id={{id}}" class="button--error">Eliminar Orden</a>
            {{endif showDeleteBtn}}

            <a href="index.php?page=Playeras-Listado" class="button">Cancelar y Volver</a>
        </fieldset>
    </form>
</section>