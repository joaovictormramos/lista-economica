<div class="container">
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Seções</th>
                @can('isSuperadmin')
                <th>Ações</th>
                @endcan
            </tr>
        </thead>
        @foreach ($sections as $section)
        <tr>
            <td>
                <p>{{$section->section_name}}</p>
            </td>
            @can('isSuperadmin')
            <td>
                <a href="/admin/editar-secao/{{$section->id}}" class="btn btn-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                        <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                    </svg>
                </a>
                <a href="/admin/excluir-secao/{{$section->id}}" class="btn btn-light border">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                        <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                    </svg>
                </a>
            </td>
            @endcan
        </tr>
        @endforeach
    </table>
    @can('isSuperadmin')
    <a class="btn btn-success" href="/admin/cadastrar-secao">Cadastrar seção</a>
    @endcan
    <a class="btn btn-outline-secondary" href="/admin/gerenciar">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>