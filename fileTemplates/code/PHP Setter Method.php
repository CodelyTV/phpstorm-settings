#set ($param_name_first_char_in_lower_case = $NAME.substring(0,1).toLowerCase())

#set ($is_a_boolean_param = $TYPE_HINT == "boolean" || $TYPE_HINT == "bool")
#set ($is_an_array_param = $TYPE_HINT == "array")

#set ($param_name = $PARAM_NAME)

#if ($is_a_boolean_param)
    #set ($param_name_prefix = "")
#elseif ($is_an_array_param)
    #set ($param_name_prefix = "some_")
    
    #if ($param_name.substring(0, 4) == "all_")
        #set ($param_name = $param_name.substring(4))
    #end
#elseif ( $param_name_first_char_in_lower_case == 'a'
    || $param_name_first_char_in_lower_case == 'e'
    || $param_name_first_char_in_lower_case == 'i'
    || $param_name_first_char_in_lower_case == 'o'
    || $param_name_first_char_in_lower_case == 'u'
    )
    #set ($param_name_prefix = "an_")
#else
    #set ($param_name_prefix = "a_")
#end

#set ($param_name_with_prefix = "$" + $param_name_prefix + $param_name)

#set ($is_not_a_primitive_param = $TYPE_HINT != "integer" && $TYPE_HINT != "int" && $TYPE_HINT != "boolean" && $TYPE_HINT != "bool" && $TYPE_HINT != "float" && $TYPE_HINT != "string" && $TYPE_HINT != "double")
#if ($is_not_a_primitive_param)
    #set ($param_type_hinting = $TYPE_HINT)
#else
    #set ($param_type_hinting = "")
#end

/**
 * @param ${TYPE_HINT} ${param_name_with_prefix}
 */
public ${STATIC} function set${NAME}($param_type_hinting ${param_name_with_prefix})
{
#if (${STATIC} == "static")
    self::$${FIELD_NAME} = ${param_name_with_prefix};
#else
    $this->${FIELD_NAME} = ${param_name_with_prefix};
#end
}