const getComments = (id) => {
  let url = "/filmeto/get_comments.php";
    fetch(url)
      .then(resp => resp.json())
      .then(data => {
        if(data.status == 'success' && data.data){
          
          let chair = document.querySelector('#chair');
          data.data.forEach(element => {
            
              chair.innerHTML += `
                         
                 <h2>`+element.name+`</h2>
                 
              `;
            
          });
        }
      });
};
