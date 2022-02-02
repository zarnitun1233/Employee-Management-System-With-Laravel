// function getId(value)
// {
//     return document.getElementById(value);
// }

// function getAll(value)
// {
//     return document.querySelectorAll(value)
// }

// getId('leaves-search').addEventListener('keyup',function(e){
//     let empName = e.target.value;
//     getAll('.leaves-row').forEach(function(row,index,array){
//         let empNameRow = row.children[1].innerText;
//         if(!empNameRow.includes(empName)){
//             row.classList.add('remove-row')
//         }else if(empName === ''){
//             getAll('.leaves-row').forEach(function(newRow){
//                 newRow.classList.remove('remove-row');
//             })
//         }else{
//             row.classList.remove('remove-row')
//         }
//     })
// })