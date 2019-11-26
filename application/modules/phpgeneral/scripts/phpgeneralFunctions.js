		

//STRINGS FIND SUBSTRINGS MATCH 

		function test_if_substring_exists_in_string_boolean(myBigString,wordToSearch)
			{
				wordToSearch =new RegExp(wordToSearch);
				//alert("wordToSearch = " + wordToSearch);
				var result = wordToSearch.test(myBigString);
				//alert("result jARIM LAST = " + result);
				return result;

			}
			
//STRINGS FIND SUBSTRINGS  TEST 	
		function match_if_substring_exists_in_string_boolean(myBigString,wordToSearch)
		{

			wordToSearch = myBigString.match( new RegExp(wordToSearch));
			//alert("wordToSearch matched = " + wordToSearch );
			return wordToSearch;

		}	
			
