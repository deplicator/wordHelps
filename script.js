$(document).ready(function() {
    $(document).keyup(function() {
        
        var stripPunctuation = $('#textarea').val().toLowerCase().replace(/[^\w\s]|_/g, "").replace(/\s+/g, " ");
        var wordarray = stripPunctuation.split(" ");
        
        if(wordarray.last() === '') {
            wordarray.pop();
        }
        if(wordarray[0] === '') {
            wordarray.splice(0,1);
        }
                
        var wordObject = new WordStats(wordarray);

        //Create word map
        var wordMapArray = wordObject.countEach().sort(function(){return 0.5 - Math.random()});
        $('#wordmap').html('<div id="remakeMap"></div>');
        for (var i = 0; i < wordMapArray.length; i++) {
            if($('.jumble').length < 20) {
                var fontSize = 100 * wordMapArray[i][2];
            } else {
                var fontSize = 500 * wordMapArray[i][2];
            }
            $('#remakeMap').append('<div class="jumble" id="' + wordMapArray[i][0] + '">' + wordMapArray[i][0] + '</div>');
            $('#' + wordMapArray[i][0]).css('font-size', fontSize);
        }

        //Show count of most common words.
        var commonwordArray = wordObject.countEach();
        $('#commonWords').html('<table id="resultTable"><tr><th colspan="2">Most Common Words</th></tr></table>');
        for (var i = 0; i < 5; i++) {
            var row = document.getElementById('resultTable').insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = commonwordArray[i][0];
            cell2.innerHTML = commonwordArray[i][1];
        }
    })
    
    $('#options').hide();
    
    $('#toggleOptions').click(function(){
        $('#options').slideToggle('slow');
        
    });
    
});

function WordStats(arr) {
    this.wordArray = arr;
    this.wordCount = arr.length;
    this.wordUniqueArray = arr.unique();
    this.wordUniqueCount = this.wordUniqueArray.length;

    //Create two dimensional array of words, word count, and word ratio.
    this.countEach = function() {
        var copyArray = arr.slice(0);
        var newArray = [];
        var ratio = '';
        for(var i = 0; i < arr.length; i++) {
            var count = 0;
            for(var j = 0; j < copyArray.length; j++) {
                if(arr[i] === copyArray[j]) {
                    count++;
                    delete copyArray[j];
                }
            }
            if(count > 0) {
                ratio = count / this.wordUniqueCount;
                newArray.push([arr[i],count,ratio]);
            }
        }
        return newArray.sort(function(a,b){return b[1] - a[1]});
    }

}

// Return new array with duplicate values removed
Array.prototype.unique =
  function() {
    var a = [];
    var l = this.length;
    for(var i=0; i<l; i++) {
      for(var j=i+1; j<l; j++) {
        // If this[i] is found later in the array
        if (this[i] === this[j])
          j = ++i;
      }
      a.push(this[i]);
    }
    return a;
  };
  
  Array.prototype.last = 
    function() {
        return this[this.length-1];
    };