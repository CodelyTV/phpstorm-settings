<?php
#parse("PHP File Header.php")

#if (${NAMESPACE})
namespace ${NAMESPACE};
#end

final class ${NAME} extends#if(${NAMESPACE}) \PHPUnit_Framework_TestCase#else PHPUnit_Framework_TestCase#end
{

}
