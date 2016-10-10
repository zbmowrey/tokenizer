namespace zbmowrey;

class Tokenizer
{
    public $tokens;
    public $loaded;

    public function __construct()
    {
        $this->tokens = array();
        $this->loaded = false;
    }

    public function add(&$variable)
    {
        $args = func_get_args();
        array_shift($args);
        if(count($args) > 0) {
            foreach($args as $token) {
                $this->tokens['#'.$token.'#'] = &$variable;
                $this->tokens['%'.$token.'%'] = &$variable;
                $this->tokens['{'.$token.'}'] = &$variable;
                $this->loaded = true;
            }
        }
    }

    public function replace($string)
    {
        if($this->loaded) {
            $find = array();
            $repl = array();
            foreach ($this->tokens as $k => $v) {
                null !== $v or $v = '';
                $find[] = $k;
                $repl[] = $v;
            }
            if (count($find) > 0) {
                $string = str_replace($find, $repl, $string);
            }
            unset($find);
            unset($repl);
        }
        return $string;
    }
}
