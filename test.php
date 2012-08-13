<script>


var test = new Paragraph();

console.log(test.getText);



function Paragraph() {

this.getText = function() {
    var textarea = document.getElementById('textarea').value;
    var result = document.getElementById('result');
    var wordmap = document.getElementById('wordmap');
    var wordarray = [];
    var wordobject = {};

    var stripPunctuation = textarea.toLowerCase().replace(/[^\w\s]|_/g, "").replace(/\s+/g, " ");
    wordarray = stripPunctuation.split(" ");
    
    return wordarray;
}
    
    
    

function WordStats(arr) {
    this.wordArray = arr;

    //Total word count.
    this.count = arr.length;
    
    //Creat two dimensional array of words and count.
    this.countEach = function() {
        var oldArray = this.wordArray.slice(0);
        var newArray = [];
        var arrlen = this.wordArray.length;
        var diversity = '';

        for(var i = 0; i < arrlen; i++) {
            var acount = 0;
            var oarlen = oldArray.length;
            for(var j = 0; j < oarlen; j++) {
                if (this.wordArray[i] == oldArray[j]) {
                    acount++;
                    delete oldArray[j];
                }
            }
            
            if(acount > 0) {
                diversity = acount / this.count;
                newArray.push([arr[i],acount,diversity])
            }
        }
        return newArray.sort(function(){return 0.5 - Math.random()});
    }
    
    //Sorts a two dimensional array by count
    this.sortByCount = function() {
        return this.countEach().sort(function(a,b){return b[1] - a[1]});
    }
    
    //Sorts a two dimensional array alphabetically.
    this.sortByAlpha = function() {
        return this.countEach().sort();
    }
    
    //Unique word count.
    this.uniqueWords = this.countEach().length;
    
    //Word diversity
    this.totalWordDiversity = this.uniqueWords / this.count;

}





/*
function display() {
    var textarea = document.getElementById('textarea').value;
    var result = document.getElementById('result');
    var wordmap = document.getElementById('wordmap');
    var wordarray = [];
    var wordobject = {};

    //http://stackoverflow.com/questions/4328500/how-can-i-strip-all-punctuation-from-a-string-in-javascript-using-regex
    var finalString = textarea.toLowerCase().replace(/[^\w\s]|_/g, "").replace(/\s+/g, " ");
    wordarray = finalString.split(" ");
    
    var wordObject = new WordStats(wordarray);
    result.innerHTML = '<div>Word Count: ' + wordObject.count + '</div>';

    result.innerHTML = '<table id="byWord"><tr><th>Word</th><th>Count</th></tr></table>';
    for(var i = 0; i < wordObject.count-1 ; i++) {
        displayResult(wordObject.countEach()[i][0],wordObject.countEach()[i][1]);
    }
    
 /*
    //Create word map
    wordMapArray = countDuplicates(wordarray).sort(randOrd);
    $('#wordmap').html('<div id="remakeMap"></div>');
    for (var i = 0; i < wordMapArray.length; i++) {
        $('#remakeMap').append('<div class="jumble" id="' + wordMapArray[i][0] + '">' + wordMapArray[i][0] + '</div>');
        $('#' + wordMapArray[i][0]).css("font-size", wordMapArray[i][1] * 5);
        
    }
*/
}




function WordStats(arr) {
    this.wordArray = arr;

    //Total word count.
    this.count = arr.length;
    
    //Creat two dimensional array of words and count.
    this.countEach = function() {
        var oldArray = this.wordArray.slice(0);
        var newArray = [];
        var arrlen = this.wordArray.length;
        var diversity = '';

        for(var i = 0; i < arrlen; i++) {
            var acount = 0;
            var oarlen = oldArray.length;
            for(var j = 0; j < oarlen; j++) {
                if (this.wordArray[i] == oldArray[j]) {
                    acount++;
                    delete oldArray[j];
                }
            }
            
            if(acount > 0) {
                diversity = acount / this.count;
                newArray.push([arr[i],acount,diversity])
            }
        }
        return newArray.sort();
    }
    
    //Sorts a two dimensional array by count
    this.sortByCount = function() {
        return this.countEach().sort(function(a,b){return b[1] - a[1]});
    }
    
    //Sorts a two dimensional array alphabetically.
    this.sortRandom = function() {
        return this.countEach().sort(function(){return 0.5 - Math.random()});
    }
    
    //Unique word count.
    this.uniqueWords = this.countEach().length;
    
    //Word diversity
    this.totalWordDiversity = this.uniqueWords / this.count;

}


function displayResult(word, count) {
    var table=document.getElementById("byWord");
    var row=table.insertRow(-1);
    var cell1=row.insertCell(0);
    var cell2=row.insertCell(1);
    cell1.innerHTML = word;
    cell2.innerHTML = count;
}



/*
//http://javascript.about.com/library/blsort2.htm
function randOrd() {
    return (Math.round(Math.random())-0.5);
}


function countDuplicates(arr) {
    var oldArray = arr.slice(0);
    var newArray = [];
    var arrlen = arr.length;
    
    for(var i = 0; i < arrlen; i++) {
        var count = 0;
        var oarlen = oldArray.length;
        for(var j = 0; j < oarlen; j++) {
            if (arr[i] == oldArray[j]) {
                count++;
                delete oldArray[j];
            }
        }
        if(count > 0) {
            newArray.push([arr[i],count])
        }
    }
    return newArray;
}

//http://stackoverflow.com/questions/840781/easiest-way-to-find-duplicate-values-in-a-javascript-array
function eliminateDuplicates(arr) {
  var i,
      len=arr.length,
      out=[],
      obj={};

  for (i=0;i<len;i++) {
    obj[arr[i]]=0;
  }
  for (i in obj) {
    out.push(i);
  }
  return out;
}

//http://www.w3schools.com/jsref/met_table_insertrow.asp
function displayResult(word, count) {
var table=document.getElementById("byWord");
var row=table.insertRow(-1);
var cell1=row.insertCell(0);
var cell2=row.insertCell(1);
cell1.innerHTML = word;
cell2.innerHTML = count;
}


//http://www.go4expert.com/forums/showthread.php?t=8158
function sortMultiDimensional(a,b) {
    // this sorts the array using the second element    
    return ((a[1] > b[1]) ? -1 : ((a[1] < b[1]) ? 1 : 0));
}
*/


</script>