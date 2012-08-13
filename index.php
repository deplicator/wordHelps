<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="./script.js"></script>
        <link rel="stylesheet" type="text/css" href="default.css"/>
    </head>

	<body>
        <div id="inputarea">
            <textarea id="textarea" rows="13"></textarea>
            
		</div>
		<div id="wordmap"></div>
		<div id="info">
            <div id="stats"></div>
            <div id="commonWords">
                <table id="resultTable">
                    <tr><th colspan="2">Most Common Words</th></tr>
                </table>
            </div>
            <div id="toggleOptions">Show Options</div>
            <div id="options">
                <span><input id="ignoreAll" type="checkbox" name="ignoreAll" value="ignore" />Ignore All Common Words</span>
                <span><input id="ignoreNouns" type="checkbox" name="ignoreNouns" value="ignore" />Ignore Nouns</span>
                <span><input id="ignoreVerbs" type="checkbox" name="ignoreVerbs" value="ignore" />Ignore Verbs</span>
                <span><input id="ignoreAdjectives" type="checkbox" name="ignoreAdjectives" value="ignore" />Ignore Adjectives</span>
                <span><input id="ignorePrepositions" type="checkbox" name="ignorePrepositions" value="ignore" />Ignore Prepositions</span>
            </div>
        </div>
		
	</body>

</html>