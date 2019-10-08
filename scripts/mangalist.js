function loadJSON(callback) {
    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', 'mangaedenapi/mangalist.json', true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
        }
    };
    xobj.send(null);
}

function init() {
    loadJSON(function(response) {
        // Parse JSON string into object
        let responsebody = JSON.parse(response);
        let mylist= document.getElementById('list');
        for(let i=0; i<responsebody.manga.length; i++){
            let li = document.createElement('li');
            let link= document.createElement('a');
            link.textContent = responsebody.manga[i].t;
            let info=responsebody.manga[i];
            link.setAttribute('href', "mangainfo.php?info="+JSON.stringify(info));
            li.appendChild(link);
            mylist.appendChild(li);

        }
        //SORTING BUTTON BELOW
        let sortbtn= document.createElement('button');
        sortbtn.setAttribute('type', 'button');
        sortbtn.innerHTML= "Sort by name";
        sortbtn.addEventListener('click', function () {
            sortList();
        });
        let sortbtnparent= document.getElementById('myButton');
        sortbtnparent.style.display="";
        sortbtnparent.appendChild(sortbtn);
    });

}

//SEARCH MANGA
function searchmanga() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("list");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}



function sortList() {
    var t0 = performance.now();
    var list, i, switching, b, shouldSwitch;
    list = document.getElementById("list");
    switching = true;
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        b = list.getElementsByTagName("LI");
        // Loop through all list items:
        for (i = 0; i < (b.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Check if the next item should
            switch place with the current item: */
            if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
                /* If next item is alphabetically lower than current item,
                mark as a switch and break the loop: */
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark the switch as done: */
            b[i].parentNode.insertBefore(b[i + 1], b[i]);
            switching = true;
        }
    }
    var t1 = performance.now();
    console.log("Call to doSomething took " + (t1 - t0) + " milliseconds.");
}

// function bubblesort(){
//     var t0 = performance.now();
//
//     var elements= document.getElementsByTagName('LI');
//
//     for(var i=0; i<elements.length; i++){
//         for(var j=0; j<elements.length-1; j++){
//             if(elements[j].innerHTML.toLowerCase() > elements[j+1].innerHTML.toLowerCase()){
//                 bubbleswitchelements(elements, j);
//             }
//             else{console.log("no need");}
//         }
//
//     }
//     var t1 = performance.now();
//     console.log("Call to doSomething took " + (t1 - t0) + " milliseconds.");
// }
//
// function bubbleswitchelements(elements, j) {
//     // var temp=elements[j];
//     // elements[j]=elements[j+1];
//     // elements[j+1]=temp;
//     elements[j].parentNode.insertBefore(elements[j + 1], elements[j]);
// }

function quickSort(arr, left, right){
    var len = arr.length,
        pivot,
        partitionIndex;


    if(left < right){
        pivot = right;
        partitionIndex = partition(arr, pivot, left, right);

        //sort left and right
        quickSort(arr, left, partitionIndex - 1);
        quickSort(arr, partitionIndex + 1, right);
    }
    return arr;
}


function partition(arr, pivot, left, right){
    var pivotValue = arr[pivot],
        partitionIndex = left;

    for(var i = left; i < right; i++){
        if(arr[i] < pivotValue){
            swap(arr, i, partitionIndex);
            partitionIndex++;
        }
    }
    swap(arr, right, partitionIndex);
    return partitionIndex;
}


function swap(arr, i, j){
    var temp = arr[i];
    arr[i] = arr[j];
    arr[j] = temp;
}



//DISPLAY MANGA COVER IN LIST
// let cover= document.createElement('img');
// cover.setAttribute('src', 'image.php?id='+responsebody.manga[i].im);
// cover.setAttribute('alt', 'img not found');
// li.appendChild(cover);


//ORIGINAL INIT
// function init() {
//     loadJSON(function(response) {
//         // Parse JSON string into object
//         let responsebody = JSON.parse(response);
//         let mylist= document.getElementById('list');
//         for(let i=0; i<responsebody.manga.length; i++){
//             let li = document.createElement('li');
//             let link= document.createElement('a');
//             link.textContent = responsebody.manga[i].t;
//             let info=responsebody.manga[i];
//             link.setAttribute('href', "mangainfo.php?info="+JSON.stringify(info));
//             li.appendChild(link);
//             mylist.appendChild(li);
//
//         }
//         //SORTING BUTTON BELOW
//         let sortbtn= document.createElement('button');
//         sortbtn.setAttribute('type', 'button');
//         sortbtn.innerHTML= "Sort by name";
//         sortbtn.addEventListener('click', function () {
//             sortList();
//         });
//         let sortbtnparent= document.getElementById('myButton');
//         sortbtnparent.style.display="";
//         sortbtnparent.appendChild(sortbtn);
//     });
//
// }