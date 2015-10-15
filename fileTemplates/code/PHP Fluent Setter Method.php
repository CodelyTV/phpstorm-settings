#set ($field_name_first_char_in_lower_case = $NAME.substring(0,1).toLowerCase())

#if ( ${TYPE_HINT} == "boolean" || ${TYPE_HINT} == "bool" )
    #set ($field_name_prefix = "")
#elseif ( $field_name_first_char_in_lower_case == 'a'
    || $field_name_first_char_in_lower_case == 'e'
    || $field_name_first_char_in_lower_case == 'i'
    || $field_name_first_char_in_lower_case == 'o'
    || $field_name_first_char_in_lower_case == 'u'
    )
    #set ($field_name_prefix = "an_")
#else
    #set ($field_name_prefix = "a_")
#end

/**
 * @param ${TYPE_HINT} $${field_name_prefix}${PARAM_NAME}
 *
 * @return ${CLASS_NAME}
 */
public function set${NAME}($${field_name_prefix}${PARAM_NAME})
{
    $this->${FIELD_NAME} = $${field_name_prefix}${PARAM_NAME};
    return $this;
}
