#set ($param_array = $PARAM_LIST.split(","))

#set ($header_param_list_string = "")
#set ($body_param_assignation_list_string = "")

#foreach( $param in $param_array )
    #set ($has_type_hinting = $param.substring(0,1) != "$")
    
    #if ($has_type_hinting)
        #set ($param_data_array = $param.split(" "))
        #set ($param_type_hinting = $param_data_array[0])
        #set ($param_name = $param_data_array[1])
    #else
        #set ($param_type_hinting = "")
        #set ($param_name = $param)
    #end
    
    #set ($field_name = $param_name)
    
    #set ($param_name_first_char_in_lower_case = $param_name.substring(1, 2).toLowerCase())
    
    #set ($param_name_first_3_chars = $param_name.substring(1, 4))
    #set ($param_name_first_4_chars = $param_name.substring(1, 5))
    #set ($is_a_boolean_param = ( $param_name_first_3_chars == "is_" || $param_name_first_4_chars == "has_" ) )

    #set ($is_an_array_param = $param_type_hinting == "array")
    
    #if ($is_a_boolean_param)
        #set ($param_name_prefix = "")
    #elseif ($is_an_array_param)
        #set ($param_name_prefix = "some_")
        
        #if ($param_name.substring(1, 5) == "all_")
            #set ($param_name = $param_name.substring(4))
        #end
    #elseif ($param_name_first_char_in_lower_case == 'a'
        || $param_name_first_char_in_lower_case == 'e'
        || $param_name_first_char_in_lower_case == 'i'
        || $param_name_first_char_in_lower_case == 'o'
        || $param_name_first_char_in_lower_case == 'u'
        )
        #set ($param_name_prefix = "an_")
    #else
        #set ($param_name_prefix = "a_")
    #end

    #set ($param_name_with_prefix = "$" + $param_name_prefix + $param_name.substring(1))
        
    #set ($header_param_list_string = $header_param_list_string + ", " + $param_type_hinting + " " + $param_name_with_prefix)
    
    #set ($body_param_assignation_list_string = $body_param_assignation_list_string + " $this->" + $field_name.substring(1) + " = " + $param_name_with_prefix + ";")
#end

#set ($header_param_list_string = $header_param_list_string.substring(2))

public function __construct(${header_param_list_string}) {
    ${body_param_assignation_list_string}
}