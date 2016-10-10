# tokenizer

This class will quickly and efficiently find and replace token values in a string with the values of variables
used in your code. The best use-case for this is when your clients or visitors are given a set of tokens they
can use to pass some value to a third party (link replacement, for example).

## Example:

    $token = new \zbmowrey\Tokenizer();
    $token->add($variable,'token');
    $token->add($other,'alt_token');
    $token->add($more,'another_alt_token);
    $string = "I have a #token#, its name is %alt_token%. It lives on {another_alt_token} street.";
    $string = $token->replace($string);

NOTE: The first parameter passed to add() is the variable whose value will appear in the token's location. 
This method supports an unlimited number of additional parameters (strings), which are wrapped in token 
markers (#, %, {}).
    
## Details

It is not necessary to wrap the add() statements in if(isset()) blocks, as values will be assigned as NULL if the
variable hasn't yet been assigned. 

Variables passed to Tokenizer are assigned to token placeholders by reference. The token will reflect the value 
of the variable even if the variable is created or modified later in the file. If the variable in question is 
not set by the time you reach the ->replace() call, Tokenizer will replace the token with an empty string. 

This class makes no changes to the variable itself or its value.
