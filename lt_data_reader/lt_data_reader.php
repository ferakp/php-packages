
<?php

class LinearTableDataParser
{

    private $parser_output_columns = "";
    private $parser_output_values = "";
    private $is_printable = false;


    public function parse($pi, $numberOfColumns)
    {
        global $parser_output_values;
        global $parser_output_columns;
        global $is_printable;

        $parser_output_array = explode(" ", $pi);

        $parser_output_columns = array_slice($parser_output_array, 0, $numberOfColumns);
        $parser_output_values_raw = array_slice($parser_output_array, $numberOfColumns);


        for ($i = 0; $i < count($parser_output_values_raw); $i++) {
            if ($i % $numberOfColumns != 0) {

                $parser_output_values[floor($i / $numberOfColumns)][$i % $numberOfColumns] = $parser_output_values_raw[$i];

                if ($is_printable) {
                    echo "Index: " . floor($i / $numberOfColumns) . " " . $i % $numberOfColumns . " - value: " . " " . $parser_output_values_raw[$i];
                    echo "<br/><br/>";
                    echo "After " . $parser_output_values[floor($i / $numberOfColumns)][$i % $numberOfColumns];
                    echo "<br/><br/>";
                }

            } else {

                $parser_output_values[floor($i / $numberOfColumns)] = array();
                $parser_output_values[floor($i / $numberOfColumns)][$i % $numberOfColumns] = $parser_output_values_raw[$i];
                
                if ($is_printable) {
                    echo "Index: " . floor($i / $numberOfColumns) . " " . $i % $numberOfColumns . " - value: " . " " . $parser_output_values_raw[$i];
                    echo "<br/><br/>";
                    echo "After " . $parser_output_values[floor($i / $numberOfColumns)][$i % $numberOfColumns];
                    echo "<br/><br/>";
                }

            }
        }
    }

    public function getData()
    {
        global $parser_output_values;
        global $parser_output_columns;

        return array($parser_output_columns, $parser_output_values);
    }

    public function setPrintable($switch)
    {
        global $is_printable;

        switch ($switch) {
            case true:
                $is_printable = true;
                break;
            case false:
                $is_printable = false;
                break;
        }
    }
}

$parser = new LinearTableDataParser();

function getParsedData($data, $numberOfColumns)
{
    global $parser;
    $parser->parse($data, $numberOfColumns);
    return $parser->getData();
}

?>





