#set ($field_name_in_lower_case = $NAME.substring(0,1).toLowerCase() + $NAME.substring(1))
/**
 * @return ${TYPE_HINT}
 */
public ${STATIC} function ${field_name_in_lower_case}()
{
#if (${STATIC} == "static")
    return self::$${FIELD_NAME};
#else
    return $this->${FIELD_NAME};
#end
}
