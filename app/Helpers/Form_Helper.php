<?php 
/**
 * Form Helpers
 *
 * @subpackage	Helper
 * @category	Form Helper
 * @author		Fajar Subhan
 * 
 */

/** 
 * Create a form helper for the select html tag
 * 
 * @param string $name      attribute name
 * @param string $style     the style of an html tag
 * @param array  $data      the value from the database
 * @param string $selected  attribute selected
 * @param string $event     event javascript on change
 * @param string $attr      add attribute html
 * @return string $cmb      return an html select tag
 * 
*/
if(!function_exists('select'))
{
    function select($name = '',$style = '',$data = [],$selected = '',$event = '',$attr = '')
    {
        $name = htmlentities(strip_tags(trim($name)));

        /* If no event or attribute from html */
        if(!empty($event) || !empty($attr))
        {
            $cmb = "<select name='$name' id='$name' class='$style' onchange='$event' $attr>";
        }
        else 
        {
            $cmb = "<select name='$name' id='$name' class='$style'>";
        }

        if(is_array($data))
        {
            foreach($data as $key => $value)
            {
                /* If selected is not null and $key is equal to the value of $selected */
                if(!empty($selected) && $selected == $key)
                {
                    $cmb .= "<option value='$key' selected>$value</option>";
                }
                else
                {
                    $cmb .= "<option value='$key'>$value</option>";
                }
            }
        }

        $cmb .= "</select>";

        return $cmb;
    }
}

/** 
 * Create a form helper for the input text html tag
 * 
 * @param string $name      attribute name
 * @param string $style     the style of an html tag
 * @param string $data      the value from the database
 * @param string $event     event javascript on change 'onkeyup = namefunction()'
 * @param array  $attr      add attribute html
 */

if(!function_exists('input_text'))
{
    function input_text( $name= '', $style = '', $data = '',$event = '',$attr = [])
    {
        $input = "<input type='text' name='$name' class='$style' value='$data' id='$name' $event ";

        if(is_array($attr) && count($attr) > 0)
        {
            foreach($attr as $key => $val)
            {
                $input .= " $key = '$val' ";
            }
        }

        $input .= " >";

        return $input;
    }
}

/** 
 * Create a form helper for the input password html tag
 * 
 * @param string $name      attribute name
 * @param string $style     the style of an html tag
 * @param string $data      the value from the database
 * @param string $event     event javascript on change 'onkeyup = namefunction()'
 * @param array  $attr      add attribute html
 */

if(!function_exists('input_password'))
{
    function input_password( $name= '', $style = '', $data = '',$event = '',$attr = [])
    {
        $input = "<input type='password' name='$name' class='$style' value='$data' id='$name' $event ";

        if(is_array($attr) && count($attr) > 0)
        {
            foreach($attr as $key => $val)
            {
                $input .= " $key = '$val' ";
            }
        }

        $input .= " >";

        return $input;
    }
}

/** 
 * Create a form helper for the input number html tag
 * 
 * @param string $name      attribute name
 * @param string $style     the style of an html tag
 * @param string $data      the value from the database
 * @param string $event     event javascript on change 'onkeyup = namefunction()'
 * @param array  $attr      add attribute html
 */
if(!function_exists('input_number'))
{
    function input_number( $name= '', $style = '', $data = '',$event = '',$attr = [])
    {
        $input = "<input type='number' name='$name' class='$style' value='$data' id='$name' $event min='1'";

        if(is_array($attr) && count($attr) > 0)
        {
            foreach($attr as $key => $val)
            {
                $input .= " $key = '$val' ";
            }
        }

        $input .= " >";

        return $input;
    }
}

/** 
 * Create a form helper for the input date html tag
 * 
 * @param string $name      attribute name
 * @param string $style     the style of an html tag
 * @param string $data      the value from the database
 * @param string $event     event javascript on change 'onkeyup = namefunction()'
 * @param array  $attr      add attribute html
 */
if(!function_exists('input_date'))
{
    function input_date($name= '', $style = '', $data = '',$event = '',$attr = [])
    {
        $input = "<input type='date' name='$name' class='$style' value='$data' id='$name' $event min='1'";

        if(is_array($attr) && count($attr) > 0)
        {
            foreach($attr as $key => $val)
            {
                $input .= " $key = '$val' ";
            }
        }

        $input .= " >";

        return $input;
    }
}

/** 
 * Create a form helper for the input email html tag
 * 
 * @param string $name      attribute name
 * @param string $style     the style of an html tag
 * @param string $data      the value from the database
 * @param string $event     event javascript on change 'onkeyup = namefunction()'
 * @param array  $attr      add attribute html
 */
if(!function_exists('input_email'))
{
    function input_email($name= '', $style = '', $data = '',$event = '',$attr = [])
    {
        $input = "<input type='email' name='$name' class='$style' value='$data' id='$name' $event";

        if(is_array($attr) && count($attr) > 0)
        {
            foreach($attr as $key => $val)
            {
                $input .= " $key = '$val' ";
            }
        }

        $input .= " >";

        return $input;
    }
}

/** 
 * Create a form helper for the input time html tag
 * 
 * @param string $name      attribute name
 * @param string $style     the style of an html tag
 * @param string $data      the value from the database
 * @param string $event     event javascript on change 'onkeyup = namefunction()'
 */
if(!function_exists('input_time'))
{
    function input_time($name= '', $style = '', $data = '',$event = '')
    {
        $input = "<input type='time' name='$name' class='$style' value='$data' id='$name' $event>";

        return $input;
    }
}

/** 
 * Create a form helper for the input email html tag
 * 
 * @param string $name      attribute name
 * @param string $style     the style of an html tag
 * @param string $event     event javascript on change 'onkeyup = namefunction()'
 * @param array  $attr      add attribute html
 */
if(!function_exists('textarea'))
{
    function textarea($name= '', $style = '',$event = '',$attr = [])
    {
        $input = "<textarea name='$name' class='$style' id='$name' $event";

        if(is_array($attr) && count($attr) > 0)
        {
            foreach($attr as $key => $val)
            {
                $input .= " $key = '$val' ";
            }
        }

        $input .= " >";

        $input .= "</textarea>";

        return $input;
    }
}

/** 
 * Create a form helper for the input hidden html tag
 * 
 * @param  string  $name      attribute name
 * @param  string  $data      the value from the database
 * @return string  $hidden    return an html input type hidden 
 * 
*/
if(!function_exists('hidden'))
{
    function hidden($name = '', $data = '')
    {
        $hidden = "<input type='hidden' name='$name' id='$name' value='$data'>";

        return $hidden;
    }
}