var pages;
function getParameter(parameterName) {
    var result = null,
        tmp = [];
    var items = location.search.substr(1).split("&");
    for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
    }
    return result;
}


function getChapter(chapterid) {
    var request= new XMLHttpRequest();
    request.open('GET','https://www.mangaeden.com/api/chapter/' + chapterid, false);
    request.onload= function () {
        pages = JSON.parse(request.responseText);
        startReading(pages);
        // console.log("bruh " + temp.images);
        // renderHTML(result);
        var startbutton = document.getElementById('start');
        startbutton.addEventListener("click", function () {
                startReading(pages);
            }
        );
    };
    console.log("im first ");
    request.send();
    console.log("im second ");
}


function startReading(pages) {
    console.log(pages.images);
    var images= pages.images;
    let i=images.length-1;
    document.getElementById("pagenumber").innerHTML=images[i][0];

    var prevbutton= document.getElementById('prev');
    prevbutton.addEventListener("click", function () {
        i++;
        if(i>images.length-1)i=0;
        document.getElementById("currentpage").src = "../anime_project/image.php?pageid="+images[i][1];
        document.getElementById("pagenumber").innerHTML=images[i][0];

    });

    var nextbutton= document.getElementById('next');
    nextbutton.addEventListener("click", function () {
        i--;
        if(i < 0)i=(images.length-1);
        document.getElementById("currentpage").src = "../anime_project/image.php?pageid="+images[i][1];
        document.getElementById("pagenumber").innerHTML=images[i][0];
    });
    // var currentpage= document.getElementById('currentpage');
    document.getElementById("currentpage").src = "../anime_project/image.php?pageid="+images[i][1];

}

var chapterid= getParameter('chapterid');
getChapter(chapterid);






