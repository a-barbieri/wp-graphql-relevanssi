<?php 

class SearchCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function testPagination(FunctionalTester $I)
    {
        // Avoid storing colors in alphabetical orders otherwise you mihgt end up with a false positive.
        $colors = array(
            "yellow",
            "red",
            "brown",
            "black"
        );
        $animals = array(
            "cat",
            "dog",
            "fish"
        );
        foreach ($animals as $animal) {
            foreach ($colors as $color) {
                $I->havePageInDatabase(['post_title' => $color . " " . $animal]);
            }
        }

//        $query = '
//        {
//            postsSearch(where: {search: "cat"}) {
//                edges {
//                    node {
//                        slug
//                    }
//                }
//            }
//        }';

        $query = '
        {
          generalSettings {
            url
          }
        }';

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/graphql', [
            'query' => $query,
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        // $res = $I->grabResponse();
        $I->seeResponseContainsJson([
            'data' => [
                'pages' => [
                    'nodes' => [
                        ['slug' => 'black cat'],
                        ['slug' => 'brown cat'],
                        ['slug' => 'red cat'],
                        ['slug' => 'yellow cat'],
                    ],
                ],
            ],
        ]);
    }


}


