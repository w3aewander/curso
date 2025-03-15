/**
 * charset=utf-8
 * @fileOverview app.js
 * @version 1.0
 * @since 2025-03-15
 * @description app.js arquivo principal do projeto
  */


 function salvarCurso(obj){
    var curso = {
        nome: obj.nome,
        descricao: obj.descricao,
        cargaHoraria: obj.cargaHoraria,
        valor: obj.valor
    };
    
    fetch('http://localhost/cursos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(curso)
    }).catch(function(err){
        console.error('Erro ao salvar curso', err);
    });
 }

