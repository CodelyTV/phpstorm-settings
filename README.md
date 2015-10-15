Codely.tv PhpStorm Settings
========================

PhpStorm or IntelliJ settings following the Codely.tv conventions.

Code and File Templates
----------------------------------

  * Video (Spanish): https://www.youtube.com/watch?v=V3Sbf-eRwec
  * Post (Spanish): http://codely.tv/screencasts/generacion-codigo-intellij-phpstorm

### Example

Class attributes example:

```php
    /** @var Email */
    private $email;

    /** @var string */
    private $password;

    /** @var \DateTimeImmutable */
    private $birth_day;

    /** @var boolean */
    private $is_active;

    /** @var array */
    private $all_friends;
```

Generated constructor:

  * "a" / "an" prefix for simple variables
  * "some" -> "all" convention for arrays or Collections
  * Type hinting (already supported by PhpStorm by default)

```php
    public function __construct(
        Email $an_email,
        $a_password,
        \DateTimeImmutable $a_birth_day,
        $is_active,
        array $some_friends
    )
    {
        $this->email       = $an_email;
        $this->password    = $a_password;
        $this->birth_day   = $a_birth_day;
        $this->is_active   = $is_active;
        $this->all_friends = $some_friends;
    }
```

Generated getter:

  * No "get" prefix

```php
    /**
     * @return Email
     */
    public function email()
    {
        return $this->email;
    }
```

Generated setter:

  * "a" / "an" prefix for simple variables
  * "some" -> "all" convention for arrays or Collections
  * Type hinting (not supported by PhpStorm by default)

```php
    /**
     * @param Email $an_email
     */
    public function setEmail(Email $an_email)
    {
        $this->email = $an_email;
    }
```


