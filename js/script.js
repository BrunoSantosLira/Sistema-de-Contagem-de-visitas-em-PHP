function excluir(id,referrer,email) {
    console.log(`Item ${id} excluido`);
    console.log(referrer)

    fetch(`http://localhost:8080/excluir.php?site_id=${id}&referrer="${referrer}"&email=${email}`);
    $('#myModal').modal('show')

}


function inserir(id){
    console.log(id);

    fetch(`http://localhost:8080/inserir.php?site_id=${id}`);
    $('#myModal').modal('show')
}