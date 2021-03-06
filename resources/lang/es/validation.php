<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => '":attribute" debe ser aceptado.',
    'active_url'           => '":attribute" no es una URL válida.',
    'after'                => '":attribute" debe ser una fecha posterior a :date.',
    'after_or_equal'       => '":attribute" debe ser una fecha posterior o igual a :date.',
    'alpha'                => '":attribute" sólo debe contener letras.',
    'alpha_dash'           => '":attribute" sólo debe contener letras, números y guiones.',
    'alpha_num'            => '":attribute" sólo debe contener letras y números.',
    'array'                => '":attribute" debe ser un conjunto.',
    'before'               => '":attribute" debe ser una fecha anterior a :date.',
    'before_or_equal'      => '":attribute" debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => '":attribute" tiene que estar entre :min - :max.',
        'file'    => '":attribute" debe pesar entre :min - :max kilobytes.',
        'string'  => '":attribute" tiene que tener entre :min - :max caracteres.',
        'array'   => '":attribute" tiene que tener entre :min - :max ítems.',
    ],
    'boolean'              => 'El campo ":attribute" debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de ":attribute" no coincide.',
    'date'                 => '":attribute" no es una fecha válida.',
    'date_format'          => '":attribute" no corresponde al formato :format.',
    'different'            => '":attribute" y :other deben ser diferentes.',
    'digits'               => '":attribute" debe tener :digits dígitos.',
    'digits_between'       => '":attribute" debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen ":attribute" no son válidas.',
    'distinct'             => 'El campo ":attribute" contiene un valor duplicado.',
    'email'                => '":attribute" no es un correo válido',
    'exists'               => '":attribute" es inválido.',
    'file'                 => 'El campo ":attribute" debe ser un archivo.',
    'filled'               => 'El campo ":attribute" es obligatorio.',
    'image'                => '":attribute" debe ser una imagen.',
    'in'                   => '":attribute" es inválido.',
    'in_array'             => 'El campo ":attribute" no existe en :other.',
    'integer'              => '":attribute" debe ser un número entero.',
    'ip'                   => '":attribute" debe ser una dirección IP válida.',
    'json'                 => 'El campo ":attribute" debe tener una cadena JSON válida.',
    'max'                  => [
        'numeric' => '":attribute" no debe ser mayor a :max.',
        'file'    => '":attribute" no debe ser mayor que :max kilobytes.',
        'string'  => '":attribute" no debe ser mayor que :max caracteres.',
        'array'   => '":attribute" no debe tener más de :max elementos.',
    ],
    'mimes'                => '":attribute" debe ser un archivo con formato: ":values".',
    'mimetypes'            => '":attribute" debe ser un archivo con formato: ":values".',
    'min'                  => [
        'numeric' => 'El tamaño de ":attribute" debe ser de al menos :min.',
        'file'    => 'El tamaño de ":attribute" debe ser de al menos :min kilobytes.',
        'string'  => '":attribute" debe contener al menos :min caracteres.',
        'array'   => '":attribute" debe tener al menos :min elementos.',
    ],
    'not_in'               => '":attribute" es inválido.',
    'numeric'              => '":attribute" debe ser numérico.',
    'present'              => 'El campo ":attribute" debe estar presente.',
    'regex'                => 'El formato de ":attribute" es inválido.',
    'required'             => 'El campo ":attribute" es obligatorio.',
    'required_if'          => 'El campo ":attribute" es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo ":attribute" es obligatorio a menos que :other esté en ":values".',
    'required_with'        => 'El campo ":attribute" es obligatorio cuando ":values" está presente.',
    'required_with_all'    => 'El campo ":attribute" es obligatorio cuando ":values" está presente.',
    'required_without'     => 'El campo ":attribute" es obligatorio cuando ":values" no está presente.',
    'required_without_all' => 'El campo ":attribute" es obligatorio cuando ":values" esté vacío.',
    'same'                 => '":attribute" y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de ":attribute" debe ser :size.',
        'file'    => 'El tamaño de ":attribute" debe ser :size kilobytes.',
        'string'  => '":attribute" debe contener :size caracteres.',
        'array'   => '":attribute" debe contener :size elementos.',
    ],
    'string'               => 'El campo ":attribute" debe ser una cadena de caracteres.',
    'timezone'             => 'El ":attribute" debe ser una zona horaria válida.',
    'unique'               => '":attribute" ya existe.',
    'uploaded'             => 'La carga de ":attribute" ha fallado.',
    'url'                  => 'El formato ":attribute" es inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        
        'userPop' => [
            'required' => 'El nombre usuario es requerido para la actualización',
            'min' => 'El nombre de usuario necesita minimo 3 caracteres',
            'max' => 'El nombre de usuario no puede exceder de 15 caracteres',
            'unique' => 'El nombre de usuario ya existe en otro registro',
        ],
        'namePop' => [
            'required' => 'El nombre es requerido para la actualización',
            'min' => 'El nombre necesita minimo 4 caracteres',
            'max' => 'El nombre no puede exceder de 30 caracteres',
            'unique' => 'El nombre ya existe en la base de datos'
        ],
        'lastnamePop' => [
            'required' => 'Los apellidos son requeridos para la actualización',
            'min' => 'Los apellidos necesitan minimo 5 caracteres',
            'max' => 'Los apellidos no pueden exceder de 30 caracteres',
        ],
        'emailPop' => [
            'required' => 'El email es requerido para la actualización',
            'min' => 'El email de usuario necesita minimo 3 caracteres',
            'max' => 'El email de usuario no puede exceder de 25 caracteres',
            'email' => 'El email de usuario no es valido',
            'unique' => 'El email de usuario ya existe en otro registro',
        ],
        
        'userPop2' => [
            'required' => 'El nombre usuario es requerido para la creación del mismo',
            'min' => 'El nombre de usuario necesita minimo 3 caracteres',
            'max' => 'El nombre de usuario no puede exceder de 15 caracteres',
            'unique' => 'El nombre de usuario debe ser unico',
        ],
        'passwordPop2' => [
            'required' => 'La contraseña de usuario es requerida para la creación del usuario',
            'min' => 'La contraseña debe de tener minimo 3 caracteres',
            'max' => 'La contraseña debe de tener maximo 15 caracteres',
        ],
        'namePop2' => [
            'required' => 'El nombre es requerido para la creación del usuario',
            'min' => 'El nombre necesita minimo 4 caracteres',
            'max' => 'El nombre no pueden exceder de 30 caracteres',
            'unique' => 'El nombre ya existe en la base de datos',
        ],
        'lastnamePop2' => [
            'required' => 'Los apellidos son requeridos para la creación del usuario',
            'min' => 'Los apellidos necesitan minimo 5 caracteres',
            'max' => 'Los apellidos no pueden exceder de 30 caracteres',
        ],
        'emailPop2' => [
            'required' => 'El email es requerido para la creación del usuario',
            'min' => 'El email de usuario necesita minimo 3 caracteres',
            'max' => 'El email de usuario no puede exceder de 25 caracteres',
            'email' => 'El email de usuario no es valido',
            'unique' => 'El email de usuario debe ser unico',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'name'                  => 'nombre',
        'username'              => 'usuario',
        'email'                 => 'correo electrónico',
        'first_name'            => 'nombre',
        'last_name'             => 'apellido',
        'password'              => 'contraseña',
        'password_confirmation' => 'confirmación de la contraseña',
        'city'                  => 'ciudad',
        'country'               => 'país',
        'address'               => 'dirección',
        'phone'                 => 'teléfono',
        'mobile'                => 'celular',
        'age'                   => 'edad',
        'sex'                   => 'sexo',
        'gender'                => 'género',
        'year'                  => 'año',
        'month'                 => 'mes',
        'day'                   => 'día',
        'hour'                  => 'hora',
        'minute'                => 'minuto',
        'second'                => 'segundo',
        'title'                 => 'título',
        'body'                  => 'contenido',
        'description'           => 'descripción',
        'excerpt'               => 'extracto',
        'date'                  => 'fecha',
        'time'                  => 'hora',
        'subject'               => 'asunto',
        'message'               => 'mensaje',
        'yesterday'             => 'ayer',
    ],

];
