<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CrudTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                 ->clickLink('Entrar')
                 ->waitForText('Usuário')
                 ->type('#loginUsuario', '111111')
                 ->press('Login')
                 ->pause(1000);
        });
    }
     public function testCreateRecord(){ 

         $this->browse(function (Browser $browser) { 
            $browser->visit('/create') 
                  ->assertSee('Cadastrar') 
                  ->typeSlowly('titulo', 'Pianolatria') 
                  ->typeSlowly('titulo_publicacao', 'klaxon - Mensario de Arte') 
                  ->typeSlowly('autores', 'Mário de Andrade') 
                  ->typeSlowly('editoras', 's/ed') 
                  ->typeSlowly('genero', 'Crônica') 
                  ->typeSlowly('suporte', 'Revista digitalizada') 
                  ->typeSlowly('data_publicacao', '15/05/1922') 
                  ->type('localizacao','https://digital.bbm.usp.br/bitstream/bbm/5455/1/010055-1_COMPLETO.pdf') 
                  ->typeSlowly('comentarios', 'Texto digitado por Mário Coutinho Araujo; texto revisto por Mário Eduardo Viaro') 
                  ->type('descricao', 'Chronicas Pianolatria É costume dizer-se que São Paulo está musicalmente mais adiantado do que o Rio. E logo a prova: "Tivemos Carlos Gomes. Temos Guiomar Novaes. " Não ha duvida. O Brasil ainda não produziu musico mais inspirado nem mais importante que o campineiro. Mas a época de Carlos Gomes passou. Hoje sua musica pouco interessa e não corresponde ás exigências musicaes do dia nem á sensibilidade moderna. Representa-lo ainda seria proclamar o bocejo uma sensação estética. Carlos Gomes é inegavelmente o mais inspirado de todos os nossos musicos. Seu valor histórico, para o Brasil, é e será sempre imenso. Mas ninguém negará que Rameau é uma das mais geniais personalidades da musica universal... Sua obra-prima, porém, representada ha pouco em Paris, só trouxe desapontamento. Caiu. É que o francês, embora chauvin, ainda não proclamou o bocejo sensação estética. A senhorinha Novaes é uma grandissima interprete. Sinto prazer em affirmar essa verdade e prometto, para logo, um estudo carinhoso de sua personalidade. Porém a senhorinha Guiomar Novaes e Carlos Gomes provam quando muito que temos a fortuna de produzir 2 talentos musicais extraordinarios. — E a nossa escola, de piano? retrucarão... Não ha dúvida. Possuimos nossa escola de piano como, certo, a América do Sul não apresenta outra. Mas não é o progresso implacável do piano, aqui uma das causas do nosso atrazo musical? É. Dizer musica, em São Paulo, quási significa dizer piano. Qualquer audição de alunos de piano enche salões.. Qualquer pianista estrangeiro tem aqui acolhida incondicional... Mas é quási só. Certo: ha na cidade virtuosi e professores de canto, violino, harpa etc. de seguro valor. Mas não ha o que se poderia chamar a tradição do instrumento. Não ha uma continuidade de orientação firme e sadia. E, principalmente, não ha alunos. O violinista com estudo de 6 annos é rarissimo. O flautista ainda o é mais. No entanto um Figueras, um Mignone, que dignos, cuidadosos mestres!... Mas qual! ha uma fada perniciosa na cidade que a cada infante dá como primeiro presente um piano e como unico destino tocar valsas de Chopin!... "Sou alfa e ómega, primeiro e último, principio e fim" como no Apocalipse. E as manifestações mais elevadas da musica? E o quarteto e a sinfonia? São Paulo hão conseguiu ainda sustentar uma sociedade de musica de câmara. E só agora a sinfonia parece atrair um pouco os pianólatras paulistanos. Bem haja pois a Sociedade de Concertos Sinfonicos! E no Rio ha tudo isso. Ha tradição de violino, de violoncelo, de canto... Com que inveja verificámos ha pouco o admirável conjunto de Pasilina d Ambrósio! no Rio ouve-se a sinfonia periodicamente. No Rio ha uma educação musical. São Paulo tem apenas uma educação pianistica, uma tradiçlo pianistica. Necessitamos dum quarteto verdadeiramente activo. Precisamos proteger a Sociedade de Concertos Sinfonicos, em tão boa hora inaugurada. Só então, livre do preconceito pianistico, São Paulo será musical') 
                  ->press('Salvar'); 

        }); 

    } 
    public function testUpdateRecord(){   
      $this->browse(function (Browser $browser) {
            $browser->visit('/')
                 ->pause(1000)
                 ->waitForText('Pianolatria')
                 ->click('tbody tr')
                 ->assertSee('Suporte')
                 ->click('a.btn.btn-primary')
                 ->pause(1000)
                 ->clear('titulo')
                 ->typeSlowly('titulo', 'Sagarana')
                 ->clear('titulo_publicacao')
                 ->typeSlowly('titulo_publicacao', 'Sagarana')
                 ->clear('autores')
                 ->typeSlowly('autores', 'João Guimarães Rosa')
                 ->clear('editoras')
                 ->typeSlowly('editoras', 'editora Universal')
                 ->clear('genero')
                 ->typeSlowly('genero', 'Contos')
                 ->clear('suporte')
                 ->typeSlowly('suporte', 'Revista digitalizada')
                 ->clear('data_publicacao')
                 ->typeSlowly('data_publicacao', '15/05/1946')
                 ->clear('localizacao')
                 ->type('localizacao','https://digital.bbm.usp.br/bitstream/bbm/5455/1/010055-1_COMPLETO.pdf')
                 ->clear('comentarios')
                 ->typeSlowly('comentarios', 'Texto digitado por Mário Coutinho Araujo; texto revisto por Mário Eduardo Viaro')
                 ->clear('descricao')
                 ->type('descricao', 'Neologismo criado por João Guimarães Rosa a partir da combinação de “saga” com o elemento tupi “-rana”, exprimindo a ideia de algo semelhante a uma saga. A primeira edição de Sagarana foi publicada pela Editora Universal, no Rio de Janeiro, em 1946. A obra reúne nove contos.')
                 ->press('Salvar')
                 ->pause(1000)
                 ->assertSee('sucesso');
       });
    }      
    public function testDeleteRecord(){
        $this->browse(function (Browser $browser){
            $browser->visit('/')
                 ->pause(1000)
                 ->waitForText('Sagarana')
                 ->click('tbody tr')
                 ->assertSee('Suporte')
                 ->click('button.btn.btn-danger')
                 ->acceptDialog()
                 ->pause(3000)
                 ->assertPathIs('/');


       });
    }
}