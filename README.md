# Padrão de Projeto: Abstract Factory

O padrão de projeto Abstract Factory é um padrão de criação que fornece uma interface para criar famílias de objetos relacionados sem especificar suas classes concretas. Ele permite que um cliente crie objetos sem precisar conhecer os detalhes de implementação das classes concretas.

## Estrutura

O padrão Abstract Factory é composto pelas seguintes partes:

1. **AbstractFactory**: É a interface que declara os métodos de criação de objetos relacionados. Cada classe concreta que implementa essa interface fornece a implementação específica desses métodos.

2. **ConcreteFactory**: São as classes concretas que implementam a interface AbstractFactory. Elas são responsáveis por criar objetos de uma família específica.

3. **AbstractProduct**: É a interface que declara os métodos que os produtos concretos devem implementar.

4. **ConcreteProduct**: São as classes concretas que implementam a interface AbstractProduct. Cada ConcreteFactory é responsável por criar produtos de sua família.

## Utilização no Projeto


![ProductFactory_class_diagram](https://github.com/edilsonsj/web2/assets/116203479/8917928c-2c1c-4de7-9cb8-792e70b75cc8)


No projeto, o padrão Abstract Factory foi aplicado para permitir a criação de diferentes tipos de produtos, como produtos de limpeza e produtos alimentícios, sem a necessidade de especificar as classes concretas.

- **ProductFactory**: É a interface que declara o método `createProduct()` para criar produtos.
- **CleaningProductFactory** e **FoodProductFactory**: São as classes concretas que implementam a interface ProductFactory para criar produtos de limpeza e produtos alimentícios, respectivamente.

O padrão Abstract Factory facilita a adição de novos tipos de produtos no sistema sem alterar o código cliente existente.

## Vantagens

- Encapsular a criação de objetos e isolar os detalhes de implementação.
- Fornecer uma maneira flexível de criar famílias de objetos relacionados.
- Facilitar a adição de novos produtos sem afetar o código existente.

## Conclusão

O padrão de projeto Abstract Factory é uma abordagem eficaz para criar objetos de famílias relacionadas sem acoplar o código cliente às classes concretas. Ele promove a modularidade, flexibilidade e extensibilidade do sistema, permitindo a fácil incorporação de novos tipos de produtos no futuro.

---

# Padrão de Projeto: Strategy

O padrão de projeto Strategy é um padrão comportamental que define uma família de algoritmos, encapsula cada algoritmo e torna-os intercambiáveis. Ele permite que um cliente escolha um algoritmo dentre muitos disponíveis, sem alterar a estrutura do cliente.

## Estrutura

O padrão Strategy é composto pelas seguintes partes:

1. **Strategy**: É a interface que declara os métodos comuns a todos os algoritmos.

2. **ConcreteStrategy**: São as classes concretas que implementam a interface Strategy e fornecem a implementação específica de um algoritmo.

3. **Context**: É a classe que possui uma referência a um objeto Strategy e a utiliza para executar um algoritmo. O cliente interage com o Context para realizar operações.

## Utilização no Projeto

![SortingStrategy_class_diagram](https://github.com/edilsonsj/web2/assets/116203479/d2d0fd0f-88ed-4282-9cc8-064139b70213)


No projeto, o padrão Strategy foi aplicado para implementar diferentes estratégias de ordenação de produtos.

- **SortingStrategy**: É a interface que declara o método `sort()` para ordenar produtos.
- **PriceSortingStrategy** e **CategorySortingStrategy**: São as classes concretas que implementam a interface SortingStrategy para ordenar produtos por preço e por categoria, respectivamente.

O padrão Strategy torna o código mais flexível, permitindo que novas estratégias de ordenação possam ser adicionadas sem afetar o código cliente existente.

## Vantagens

- Permite a substituição fácil de algoritmos sem afetar o código cliente.
- Promove a modularidade e reutilização de código.
- Facilita a adição de novos algoritmos sem modificar o cliente.

## Conclusão

O padrão de projeto Strategy é uma abordagem eficaz para lidar com situações em que diferentes algoritmos podem ser aplicados. Ele proporciona flexibilidade ao cliente para escolher a estratégia mais adequada para cada situação, mantendo a separação entre o cliente e os algoritmos específicos.

---

# Padrão de Projeto: Facade

O padrão de projeto Facade é um padrão estrutural que fornece uma interface unificada para um conjunto de interfaces em um subsistema. Ele simplifica a utilização dessas interfaces complexas, fornecendo um ponto de entrada único e facilitando a interação do cliente com o sistema subjacente.

## Estrutura

O padrão Facade é composto pelas seguintes partes:

1. **Facade**: É a classe que fornece a interface unificada para o cliente. Ela conhece as classes do subsistema e coordena suas ações para realizar tarefas complexas.

2. **Subsistema Classes**: São as classes individuais que compõem o subsistema. Elas são responsáveis por realizar tarefas específicas do sistema.

## Utilização no Projeto

![ProductFacade_class_diagram](https://github.com/edilsonsj/web2/assets/116203479/6906e906-d9c1-41ca-9e30-70ac4fc195a1)

No projeto, o padrão Facade foi aplicado para simplificar a interação do cliente com as funcionalidades de gerenciamento de produtos. A classe `ProductFacade` atua como uma fachada para as operações complexas envolvendo criação, leitura, atualização e exclusão de produtos.

- **ProductFacade**: É a fachada que fornece métodos simplificados para o cliente realizar operações como criação, leitura, atualização e exclusão de produtos. Ela coordena as operações necessárias com as classes do subsistema.
- **Product**: Representa a classe que realiza operações específicas de produtos, como criação, leitura, atualização e exclusão.
- **ProductFactory**: Representa as classes que encapsulam a criação de diferentes tipos de produtos, como produtos de limpeza e alimentos.

O padrão Facade simplifica o código do cliente, permitindo que operações complexas sejam executadas com chamadas simples à fachada. Isso reduz o acoplamento entre o cliente e o subsistema, facilitando a manutenção e evolução do sistema.

## Vantagens

- Fornecer uma interface única e simples para interagir com um subsistema complexo.
- Reduzir o acoplamento entre o cliente e as classes do subsistema.
- Melhorar a legibilidade e manutenção do código do cliente.

## Conclusão

O padrão de projeto Facade é uma abordagem eficaz para simplificar a complexidade de interações com subsistemas complexos. Ele promove a clareza, modularização e reusabilidade do código, permitindo que o cliente realize tarefas complexas por meio de uma interface unificada. No projeto em questão, o padrão Facade foi aplicado para fornecer uma fachada simples e coesa para operações de gerenciamento de produtos, facilitando a interação do cliente com o sistema subjacente.
