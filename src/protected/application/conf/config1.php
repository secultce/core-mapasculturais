<?php
$config = include 'conf-base.php';

$site_name = 'Mapa Cultural do CearÃ¡';
$site_description = 'O Mapa Cultural do CearÃ¡ Ã© a plataforma livre, gratuita e colaborativa de mapeamento da Secretaria da Cultura do Estado do CearÃ¡ sobre cenÃ¡rio cultural cearense. Ficou mais fÃ¡cil se programar para conhecer as opÃ§Ãµes culturais que as cidades cearenses oferecem: shows musicais, espetÃ¡culos teatrais, sessÃµes de cinema, saraus, entre outras. AlÃ©m de conferir a agenda de eventos, vocÃª tambÃ©m pode colaborar na gestÃ£o da cultura do estado: basta criar seu perfil de agente cultural. A partir deste cadastro, fica mais fÃ¡cil participar dos editais e programas da Secretaria e tambÃ©m divulgar seus eventos, espaÃ§os ou projetos.';

$base_domain = @$_SERVER['HTTP_HOST'];
$base_url = 'http://' . $base_domain . '/';
$map_latitude = '-5.058114374355702';
$map_longitude = '-39.4134521484375';
$map_zoom = '7';

date_default_timezone_set('America/Fortaleza');

return array_merge(
    $config,
    [
        'app.useAssetsUrlCache' => 1,
        'app.siteName' => \MapasCulturais\i::__($site_name),
        'app.siteDescription' => \MapasCulturais\i::__($site_description),

        /* to setup Saas Subsite theme */
        'namespaces' => [
            'MapasCulturais\Themes' => THEMES_PATH,
            'Ceara' => THEMES_PATH . '/Ceara/',
            'Subsite' => THEMES_PATH . '/Subsite/'
        ],

        'themes.active' => 'Ceara',
        'base.assetUrl' => $base_url . 'assets/',
        'base.url' => $base_url,

        /* Habilitar configurações importantes da aplicação: [development, staging, production] */
        'app.mode' => 'development',
        'app.enabled.seals'   => true,
        'app.enabled.apps' => false,
        'api.accessControlAllowOrigin' => '*',
        'app.offline' => false,
        'app.offlineUrl' => '/offline',
        'app.offlineBypassFunction' => null,

        /* Doctrine configurations */
        'doctrine.isDev' => false,

        /* ==================== LOGS ================== */
        #'slim.debug' => false,
        #'slim.log.enabled' => true,
        #'slim.log.level' => \Slim\Log::DEBUG,
        #'app.log.hook' => true,
        #'app.log.query' => true,
        #'app.log.requestData' => true,
        #'app.log.translations' => true,
        #'app.log.apiCache' => true,
        #'app.log.path' => '/dados/mapas/logs/',
        #'slim.log.writer' => new \MapasCulturais\Loggers\File(function () {return 'slim.log'; }),


        /* Configurações do Mapa e GeoDivisão */
        'maps.includeGoogleLayers' => true,
        'maps.center' => array($map_latitude, $map_longitude),
        'maps.zoom.default' => $map_zoom,

        ## Plugins 
        'plugins.enabled' => array('agenda-singles', 'endereco', 'notifications', 'em-cartaz', 'mailer'),

        'mailer.user' => '1b40c2575af2e2',
        'mailer.psw'  => 'c0390d3c1d1369',
        'mailer.server' => 'smtp.mailtrap.io',
        'mailer.protocol' => 'tls',
        'mailer.port'   => '2525',
        'mailer.from' => 'naoresponda@secult.ce.gov.br',

        'plugins' => array_merge(
            $config['plugins'],
            [
                'RegistrationPaymentsAuxilio' => [
                    'namespace' => 'RegistrationPaymentsAuxilio',
                    'config' => [
                        'opportunity_id' => 2852
                    ]
                ],
                'GenerateTechnicalOpinion' => ['namespace' => 'GenerateTechnicalOpinion'],
                'Accessibility' => ['namespace' => 'Accessibility'],
                'DistributionReviewers' => ['namespace' => 'DistributionReviewers'],
                'TestePlugin' => ['namespace' => 'TestePlugin'],
                'SendEmailUser' => ['namespace' => 'SendEmailUser'],
                'BasicDataInscribed' => ['namespace' => 'BasicDataInscribed'],
                'Report' => ['namespace' => 'Report'],
                'MultipleLocalAuth' => ['namespace' => 'MultipleLocalAuth'],
                'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
                'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
                'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical'],
                'AldirBlanc' => [
                    'namespace' => 'AldirBlanc',
                    'config' => [
                        'logotipo_instituicao' => 'https://mapacultural.secult.ce.gov.br/assets/img/logo-org-ceara-small.png',
                        'logotipo_central' => 'https://mapacultural.secult.ce.gov.br/assets/img/lei-aldir-small.png',
                        'link_suporte' => 'https://tawk.to/chat/5f35c9424c7806354da63dc9/default',
                        'privacidade_termos_condicoes' => 'https://mapacultural.secult.ce.gov.br/autenticacao/termos-e-condicoes',
                        'project_id' => 1992,
                        'inciso1_enabled' => true,
                        'inciso1_opportunity_id' => 2059,
                        'inciso2_enabled' => true,
                        'inciso2_opportunity_ids' => [
                            'ABAIARA'                    => 2161,
                            'ACARAPE'                    => 2162,
                            'ACARAÚ'                    => 2163,
                            'ACOPIARA'                    => 2164,
                            'AIUABA'                    => 2165,
                            'ALCÂNTARAS'                => 2166,
                            'ALTANEIRA'                    => 2167,
                            'ALTO SANTO'                => 2168,
                            'AMONTADA'                    => 2169,
                            'ANTONINA DO NORTE'            => 2170,
                            'APUIARÉS'                    => 2171,
                            'AQUIRAZ'                    => 2172,
                            'ARACATI'                    => 2173,
                            'ARACOIABA'                    => 2174,
                            'ARARENDÁ'                    => 2175,
                            'ARARIPE'                    => 2176,
                            'ARATUBA'                    => 2177,
                            'ARNEIROZ'                    => 2178,
                            'ASSARÉ'                    => 2179,
                            'AURORA'                    => 2180,
                            'BAIXIO'                    => 2181,
                            'BANABUIÚ'                    => 2182,
                            'BARBALHA'                    => 2183,
                            'BARRO'                        => 2184,
                            'BARROQUINHA'                => 2185,
                            'BATURITÉ'                    => 2186,
                            'BEBERIBE'                    => 2187,
                            'BELA CRUZ'                    => 2188,
                            'BOA VIAGEM'                => 2189,
                            'BREJO SANTO'                => 2190,
                            'CAMOCIM'                    => 2191,
                            'CAMPOS SALES'                => 2192,
                            'CANINDÉ'                    => 2193,
                            'CAPISTRANO'                => 2194,
                            'CARIRÉ'                    => 2195,
                            'CARIRIAÇU'                    => 2196,
                            'CARIÚS'                    => 2197,
                            'CASCAVEL'                    => 2198,
                            'CATUNDA'                    => 2199,
                            'CAUCAIA'                    => 2200,
                            'CEDRO'                        => 2201,
                            'CHAVAL'                    => 2202,
                            'CHORÓ'                        => 2203,
                            'CHOROZINHO'                => 2204,
                            'COREAÚ'                    => 2205,
                            'CRATEÚS'                    => 2206,
                            'CRATO'                        => 2207,
                            'CROATÁ'                    => 2208,
                            'CRUZ'                        => 2209,
                            'DEPUTADO IRAPUAN PINHEIRO'    => 2210,
                            'ERERÊ'                        => 2211,
                            'EUSÉBIO'                    => 2212,
                            'FARIAS BRITO'                => 2213,
                            'FORQUILHA'                    => 2214,
                            'FORTALEZA'                    => 2215,
                            'FORTIM'                    => 2216,
                            'FRECHEIRINHA'                => 2217,
                            'GENERAL SAMPAIO'            => 2218,
                            'GRANJA'                    => 2219,
                            'GRANJEIRO'                    => 2220,
                            'GROAÍRAS'                    => 2221,
                            'GUAIÚBA'                    => 2222,
                            'GUARACIABA DO NORTE'        => 2223,
                            'GUARAMIRANGA'                => 2224,
                            'HIDROLÂNDIA'                => 2225,
                            'HORIZONTE'                    => 2226,
                            'IBARETAMA'                    => 2227,
                            'IBIAPINA'                    => 2228,
                            'IBICUITINGA'                => 2229,
                            'ICAPUÍ'                    => 2230,
                            'ICÓ'                        => 2231,
                            'IGUATU'                    => 2232,
                            'INDEPENDÊNCIA'                => 2233,
                            'IPAPORANGA'                => 2234,
                            'IPAUMIRIM'                    => 2235,
                            'IPU'                        => 2236,
                            'IPUEIRAS'                    => 2237,
                            'IRACEMA'                    => 2238,
                            'IRAUÇUBA'                    => 2239,
                            'ITAIÇABA'                    => 2240,
                            'ITAITINGA'                    => 2241,
                            'ITAPAJÉ'                    => 2242,
                            'ITAPIPOCA'                    => 2243,
                            'ITAPIÚNA'                    => 2244,
                            'ITATIRA'                    => 2245,
                            'JAGUARETAMA'                => 2246,
                            'JAGUARIBARA'                => 2247,
                            'JAGUARIBE'                    => 2248,
                            'JAGUARUANA'                => 2249,
                            'JARDIM'                    => 2250,
                            'JATI'                        => 2251,
                            'JIJOCA DE JERICOACOARA'    => 2252,
                            'JUAZEIRO DO NORTE'            => 2253,
                            'JUCÁS'                        => 2254,
                            'LAVRAS DA MANGABEIRA'        => 2255,
                            'LIMOEIRO DO NORTE'            => 2256,
                            'MADALENA'                    => 2257,
                            'MARACANAÚ'                    => 2258,
                            'MARANGUAPE'                => 2259,
                            'MARCO'                        => 2260,
                            'MARTINÓPOLE'                => 2261,
                            'MASSAPÊ'                    => 2262,
                            'MAURITI'                    => 2263,
                            'MERUOCA'                    => 2264,
                            'MILAGRES'                    => 2265,
                            'MILHÃ'                        => 2266,
                            'MISSÃO VELHA'                => 2267,
                            'MOMBAÇA'                    => 2268,
                            'MONSENHOR TABOSA'            => 2269,
                            'MORADA NOVA'                => 2270,
                            'MORRINHOS'                    => 2271,
                            'MUCAMBO'                    => 2272,
                            'MULUNGU'                    => 2273,
                            'NOVA OLINDA'                => 2274,
                            'NOVA RUSSAS'                => 2275,
                            'NOVO ORIENTE'                => 2276,
                            'OCARA'                        => 2277,
                            'ORÓS'                        => 2278,
                            'PACAJUS'                    => 2279,
                            'PACATUBA'                    => 2280,
                            'PACOTI'                    => 2281,
                            'PACUJÁ'                    => 2282,
                            'PALHANO'                    => 2283,
                            'PALMÁCIA'                    => 2284,
                            'PARACURU'                    => 2285,
                            'PARAIPABA'                    => 2286,
                            'PARAMOTI'                    => 2287,
                            'PEDRA BRANCA'                => 2288,
                            'PENAFORTE'                    => 2289,
                            'PENTECOSTE'                => 2290,
                            'PEREIRO'                    => 2291,
                            'PINDORETAMA'                => 2292,
                            'PIQUET CARNEIRO'            => 2293,
                            'PORANGA'                    => 2294,
                            'PORTEIRAS'                    => 2295,
                            'POTENGI'                    => 2296,
                            'POTIRETAMA'                => 2297,
                            'QUITERIANÓPOLIS'            => 2298,
                            'QUIXADÁ'                    => 2299,
                            'QUIXELÔ'                    => 2300,
                            'QUIXERAMOBIM'                => 2301,
                            'QUIXERÉ'                    => 2302,
                            'REDENÇÃO'                    => 2303,
                            'RUSSAS'                    => 2304,
                            'SALITRE'                    => 2305,
                            'SANTA QUITÉRIA'            => 2306,
                            'SANTANA DO ACARAÚ'            => 2307,
                            'SANTANA DO CARIRI'            => 2308,
                            'SÃO BENEDITO'                => 2309,
                            'SÃO GONÇALO DO AMARANTE'    => 2310,
                            'SÃO JOÃO DO JAGUARIBE'        => 2311,
                            'SÃO LUÍS DO CURU'            => 2312,
                            'SENADOR POMPEU'            => 2313,
                            'SENADOR SÁ'                => 2314,
                            'SOBRAL'                    => 2315,
                            'SOLONÓPOLE'                => 2316,
                            'TABULEIRO DO NORTE'        => 2317,
                            'TAMBORIL'                    => 2318,
                            'TARRAFAS'                    => 2319,
                            'TAUÁ'                        => 2320,
                            'TEJUÇUOCA'                    => 2321,
                            'TIANGUÁ'                    => 2322,
                            'TRAIRI'                    => 2323,
                            'TURURU'                    => 2324,
                            'UBAJARA'                    => 2325,
                            'UMARI'                        => 2326,
                            'UMIRIM'                    => 2327,
                            'URUBURETAMA'                => 2328,
                            'URUOCA'                    => 2329,
                            'VARJOTA'                    => 2330,
                            'VÁRZEA ALEGRE'                => 2331,
                            'VIÇOSA DO CEARÁ'            => 2332
                        ],
                        'inciso2' => [
                            [
                                'city' => 'ABAIARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ACARAPE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ACARAÚ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ACOPIARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'AIUABA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ALCÂNTARAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ALTANEIRA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ALTO SANTO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'AMONTADA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ANTONINA DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'APUIARÉS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'AQUIRAZ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARACATI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARACOIABA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARARENDÁ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARARIPE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARATUBA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARNEIROZ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ASSARÉ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'AURORA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BAIXIO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BANABUIÚ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BARBALHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BARRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BARROQUINHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BATURITÉ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BEBERIBE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BELA CRUZ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BOA VIAGEM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BREJO SANTO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CAMOCIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CAMPOS SALES',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CANINDÉ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CAPISTRANO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CARIRÉ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CARIRIAÇU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CARIÚS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CASCAVEL',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CATUNDA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CAUCAIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CEDRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CHAVAL',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CHORÓ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CHOROZINHO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'COREAÚ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CRATEÚS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CRATO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CROATÁ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CRUZ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'DEPUTADO IRAPUAN PINHEIRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ERERÊ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'EUSÉBIO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FARIAS BRITO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FORQUILHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FORTALEZA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FORTIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FRECHEIRINHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GENERAL SAMPAIO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GRANJA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GRANJEIRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GROAÍRAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GUAIÚBA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GUARACIABA DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GUARAMIRANGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'HIDROLÂNDIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'HORIZONTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IBARETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IBIAPINA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IBICUITINGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ICAPUÍ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ICÓ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IGUATU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'INDEPENDÊNCIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IPAPORANGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IPAUMIRIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IPU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IPUEIRAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IRACEMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IRAUÇUBA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAIÇABA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAITINGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAPAJÉ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAPIPOCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAPIÚNA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITATIRA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JAGUARETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JAGUARIBARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JAGUARIBE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JAGUARUANA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JARDIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JATI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JIJOCA DE JERICOACOARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JUAZEIRO DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JUCÁS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'LAVRAS DA MANGABEIRA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'LIMOEIRO DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MADALENA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MARACANAÚ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MARANGUAPE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MARCO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MARTINÓPOLE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MASSAPÊ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MAURITI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MERUOCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MILAGRES',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MILHÃ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MISSÃO VELHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MOMBAÇA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MONSENHOR TABOSA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MORADA NOVA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MORRINHOS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MUCAMBO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MULUNGU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'NOVA OLINDA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'NOVA RUSSAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'NOVO ORIENTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'OCARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ORÓS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PACAJUS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PACATUBA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PACOTI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PACUJÁ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PALHANO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PALMÁCIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PARACURU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PARAIPABA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PARAMOTI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PEDRA BRANCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PENAFORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PENTECOSTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PEREIRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PINDORETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PIQUET CARNEIRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PORANGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PORTEIRAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'POTENGI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'POTIRETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUITERIANÓPOLIS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUIXADÁ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUIXELÔ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUIXERAMOBIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUIXERÉ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'REDENÇÃO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'RUSSAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SALITRE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SANTA QUITÉRIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SANTANA DO ACARAÚ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SANTANA DO CARIRI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SÃO BENEDITO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SÃO GONÇALO DO AMARANTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SÃO JOÃO DO JAGUARIBE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SÃO LUÍS DO CURU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SENADOR POMPEU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SENADOR SÁ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SOBRAL',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SOLONÓPOLE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TABULEIRO DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TAMBORIL',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TARRAFAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TAUÁ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TEJUÇUOCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TIANGUÁ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TRAIRI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TURURU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'UBAJARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'UMARI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'UMIRIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'URUBURETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'URUOCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'VARJOTA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'VÁRZEA ALEGRE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'VIÇOSA DO CEARÁ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscrição para o subsídio mensal para manutenção de espaços artísticos e culturais, microempresas e pequenas empresas culturais, cooperativas, instituições e organizações culturais comunitárias que tiveram as suas atividades interrompidas por força das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ]
                        ],
                        'inciso3_enabled' => false,
                        'inciso3_opportunity_ids' => []
                    ]
                ],
                'AldirBlancDataprev' => [
                    'namespace' => 'AldirBlancDataprev',
                    'config' => [
                        // indica que só deve exportar as inscrições já homologadas

                        'exportador_requer_homologacao' => false,

                        // indica que só deve consolidar o resultado se a inscrição
                        // já tiver sido processada pelo SCGE
                        'consolidacao_requer_validacoes' => ['scge']
                    ],
                ],
                'SCGE' => [
                    'namespace' => 'AldirBlancValidador',
                    'config' => [
                        // slug utilizado como id do controller e identificador do validador
                        'slug' => 'scge',

                        // nome apresentado na interface
                        'name' => 'SCGE',

                        // indica que só deve exportar as inscrições já homologadas
                        'exportador_requer_homologacao' => true,

                        // indica que a exportação não requer nenhuma validação
                        'exportador_requer_validacao' => [],

                        // indica que só deve consolidar o resultado se a inscrição
                        // já tiver sido processada pelo Dataprev
                        'consolidacao_requer_validacoes' => ['dataprev'],

                        'inciso1' => [
                            // id do field do formulário 
                            "CPF" => 'field_6479',
                            "SEXO" => "field_6489",
                            "FLAG_CAD_ESTADUAL" => 1,
                            "FLAG_CAD_MUNICIPAL" => 0,
                            "FLAG_CAD_DISTRITAL" => 0,
                            "FLAG_CAD_SNIIC" => 0,
                            "FLAG_CAD_SALIC" => 0,
                            "FLAG_CAD_SICAB" => 0,
                            "FLAG_CAD_OUTROS" => 0,
                            "SISTEMA_CAD_OUTROS" => null,
                            "IDENTIFICADOR_CAD_OUTROS" => null,
                            "FLAG_ATUACAO_ARTES_CENICAS" => "field_6467",
                            "FLAG_ATUACAO_AUDIOVISUAL" => "field_6467",
                            "FLAG_ATUACAO_MUSICA" => "field_6467",
                            "FLAG_ATUACAO_ARTES_VISUAIS" => "field_6467",
                            "FLAG_ATUACAO_PATRIMONIO_CULTURAL" => "field_6467",
                            "FLAG_ATUACAO_MUSEUS_MEMORIA" => "field_6467",
                            "FLAG_ATUACAO_HUMANIDADES" => "field_6467",
                            "FAMILIARCPF" => 'field_6491',
                            "GRAUPARENTESCO" => 'field_6491',
                            "parameters_csv_default" => [
                                "status" => 1
                            ],
                            // Opções para área de atuações culturais
                            'atuacoes-culturais' => [
                                'artes-cenicas' => [
                                    'Circo',
                                    'Dança',
                                    'Teatro',
                                    'Ópera',
                                ],
                                'artes-visuais' => [
                                    'Artes Visuais',
                                    'Artesanato',
                                    'Design',
                                    'Fotografia',
                                    'Moda',
                                ],
                                'audiovisual' => [
                                    'Audiovisual',
                                ],
                                'humanidades' => [
                                    'Literatura',
                                ],
                                'museu-memoria' => [
                                    'Museu',
                                ],
                                'musica' => [
                                    'Música',
                                ],
                                'patrimonio-cultural' => [
                                    'Cultura Popular',
                                    'Gastronomia',
                                    'Outros',
                                    'Patrimônio Cultural',
                                ],
                            ],
                        ],
                    ]
                ],
                'AldirBlancValidadorFinanceiro' => [
                    'namespace' => 'AldirBlancValidadorFinanceiro',
                    'config' => [
                        'exportador_requer_validacao' => ['homologacao', 'dataprev', 'scge'],
                    ]
                ],
                'RegistrationPayments' => [
                    'namespace' => 'RegistrationPayments',
                    'config'
                ]
            ]
        ),
        /*	Esse módulo é para configurar a funcionalidade de denúncia e/ou sugestões */
        'module.CompliantSuggestion' => [
            'compliant' => false,
            'suggestion' => false
        ],

        // Token da API de Cep
        // Adquirido ao fazer cadastro em http://www.cepaberto.com/
        'cep.token' => '1a61e4d00bf9c6a85e3b696ef7014372',

        /* Modelo de configuração para usar o id da cultura */
        //        'auth.provider' => 'OpauthOpenId',
        //        'auth.config' => [
        //            'login_url' => '',
        //            'logout_url' => '',
        //            'salt' => '',
        //            'timeout' => '24 hours'
        //        ],

        //Modelo de autenticação para Login Cidadão
        //        'auth.provider' => 'OpauthLoginCidadao',
        //        'auth.config' => array(
        //        'client_id' => '',
        //        'client_secret' => '',
        //        'auth_endpoint' => 'https://[SUA-URL]/openid/connect/authorize',
        //        'token_endpoint' => 'https://[SUA-URL]/openid/connect/token',
        //        'user_info_endpoint' => 'https://[SUA-URL]/api/v1/person.json'
        //        ),


        //'auth.provider' => 'Fake',
        //configuração de provedores Auth para Login 
        //'auth.provider' => '\MultipleLocalAuth\Provider',
        /*'auth.config' => [
            'salt' => 'LT_SECURITY_SALT_SECURITY_SALT_SECURITY_SALT_SECURITY_SALT_SECU',
            'timeout' => '24 hours',
            'enableLoginByCPF' => true,
            'metadataFieldCPF' => 'documento',
            'userMustConfirmEmailToUseTheSystem' => false,
            'passwordMustHaveCapitalLetters' => true,
            'passwordMustHaveLowercaseLetters' => true,
            'passwordMustHaveSpecialCharacters' => true,
            'passwordMustHaveNumbers' => true,
            'minimumPasswordLength' => 7,
            'google-recaptcha-secret' => '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe',
            'google-recaptcha-sitekey' => '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
            'sessionTime' => 7200, // int , tempo da sessao do usuario em segundos
            'numberloginAttemp' => '5', // tentativas de login antes de bloquear o usuario por X minutos
            'timeBlockedloginAttemp' => '900', // tempo de bloqueio do usuario em segundos
            'strategies' => [
                'Facebook' => [
                    'app_id' => 'SUA_APP_ID',
                    'app_secret' => 'SUA_APP_SECRET',
                    'scope' => 'email'
                ],
                'LinkedIn' => [
                    'api_key' => 'SUA_API_KEY',
                    'secret_key' => 'SUA_SECRET_KEY',
                    'redirect_uri' => '/autenticacao/linkedin/oauth2callback',
                    'scope' => 'r_emailaddress'
                ],
                'Google' => [
                    'client_id' => 'SEU_CLIENT_ID',
                    'client_secret' => 'SEU_CLIENT_SECRET',
                    'redirect_uri' => '/autenticacao/google/oauth2callback',
                    'scope' => 'email'
                ],
                'Twitter' => [
                    'app_id' => 'SUA_APP_ID',
                    'app_secret' => 'SUA_APP_SECRET',
                ],
            ]
        ],*/

	'doctrine.database' => [
            'host'        => '172.18.3.39',
            'dbname'      => 'mapasculturais',
            'user'        => 'mapas-homolog',
            'password'    => '1q2w3e',
        ],

    ]
);
