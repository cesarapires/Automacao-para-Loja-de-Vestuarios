<table>
    <thead>
        <tr>
            <th>Identificador URL</th>
            <th>Nome</th>
            <th>Categorias</th>
            <th>Nome da variação 1</th>
            <th>Valor da variação 1</th>
            <th>Nome da variação 2</th>
            <th>Valor da variação 2</th>
            <th>Nome da variação 3</th>
            <th>Valor da variação 3</th>
            <th>Preço</th>
            <th>Preço promocional</th>
            <th>Peso (kg)</th>
            <th>Altura (cm)</th>
            <th>Largura (cm)</th>
            <th>Comprimento (cm)</th>
            <th>Estoque</th>
            <th>SKU</th>
            <th>Código de barras</th>
            <th>Exibir na loja</th>
            <th>Frete gratis</th>
            <th>Descrição</th>
            <th>Tags</th>
            <th>Título para SEO</th>
            <th>Descrição para SEO</th>
            <th>Marca</th>
            <th>Produto Físico</th>
            <th>MPN (Cód. Exclusivo, Modelo Fabricante)</th>
            <th>Sexo</th>
            <th>Faixa etária</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->url}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->type->name}}</td>
                <td>Tamanho</td>
                <td>{{$product->size->name}}</td>
                <td>Estampa</td>
                <td>{{$product->color}}</td>
                <td></td>
                <td></td>
                <td>{{$product->price_sell}}</td>
                <td></td>
                <td>0.1</td>
                <td>15.0</td>
                <td>24.0</td>
                <td>10.00</td>
                <td>{{$product->stock}}</td>
                <td></td>
                <td></td>
                <td>SIM</td>
                <td>NÃO</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>SIM</td>
                <td></td>
                <td>Feminino</td>
                <td>Adulto</td>
            </tr>
        @endforeach
    </tbody>
</table>
