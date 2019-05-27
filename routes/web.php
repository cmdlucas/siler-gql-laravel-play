<?php

use Siler\GraphQL;

class Init {
    public static function play() {
        $typeDefs = file_get_contents(__DIR__.'/schema.graphql');
    
        $resolvers = [
            'Query' => [
                'message' => 'foo',
            ],
            'Mutation' => [
                'sum' => function ($root, $args) {
                    return $args['a'] + $args['b'];
                },
            ],
        ];
    
        return GraphQL\init(GraphQL\schema($typeDefs, $resolvers));
    }

}

Route::post('/play', function() { 
    return Init::play();
});
