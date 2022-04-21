<?php
$config = include 'conf-base.php';

$site_name = 'Mapa Cultural do Ceará';
$site_description = 'O Mapa Cultural do Ceará é a plataforma livre, gratuita e colaborativa de mapeamento da Secretaria da Cultura do Estado do Ceará sobre cenário cultural cearense. Ficou mais fácil se programar para conhecer as opções culturais que as cidades cearenses oferecem: shows musicais, espetáculos teatrais, sessões de cinema, saraus, entre outras. Além de conferir a agenda de eventos, você também pode colaborar na gestão da cultura do estado: basta criar seu perfil de agente cultural. A partir deste cadastro, fica mais fácil participar dos editais e programas da Secretaria e também divulgar seus eventos, espaços ou projetos.';

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

        /* Habilitar configura��es importantes da aplica��o: [development, staging, production] */
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


        /* Configura��es do Mapa e GeoDivis�o */
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
                            'ACARA�'                    => 2163,
                            'ACOPIARA'                    => 2164,
                            'AIUABA'                    => 2165,
                            'ALC�NTARAS'                => 2166,
                            'ALTANEIRA'                    => 2167,
                            'ALTO SANTO'                => 2168,
                            'AMONTADA'                    => 2169,
                            'ANTONINA DO NORTE'            => 2170,
                            'APUIAR�S'                    => 2171,
                            'AQUIRAZ'                    => 2172,
                            'ARACATI'                    => 2173,
                            'ARACOIABA'                    => 2174,
                            'ARAREND�'                    => 2175,
                            'ARARIPE'                    => 2176,
                            'ARATUBA'                    => 2177,
                            'ARNEIROZ'                    => 2178,
                            'ASSAR�'                    => 2179,
                            'AURORA'                    => 2180,
                            'BAIXIO'                    => 2181,
                            'BANABUI�'                    => 2182,
                            'BARBALHA'                    => 2183,
                            'BARRO'                        => 2184,
                            'BARROQUINHA'                => 2185,
                            'BATURIT�'                    => 2186,
                            'BEBERIBE'                    => 2187,
                            'BELA CRUZ'                    => 2188,
                            'BOA VIAGEM'                => 2189,
                            'BREJO SANTO'                => 2190,
                            'CAMOCIM'                    => 2191,
                            'CAMPOS SALES'                => 2192,
                            'CANIND�'                    => 2193,
                            'CAPISTRANO'                => 2194,
                            'CARIR�'                    => 2195,
                            'CARIRIA�U'                    => 2196,
                            'CARI�S'                    => 2197,
                            'CASCAVEL'                    => 2198,
                            'CATUNDA'                    => 2199,
                            'CAUCAIA'                    => 2200,
                            'CEDRO'                        => 2201,
                            'CHAVAL'                    => 2202,
                            'CHOR�'                        => 2203,
                            'CHOROZINHO'                => 2204,
                            'COREA�'                    => 2205,
                            'CRATE�S'                    => 2206,
                            'CRATO'                        => 2207,
                            'CROAT�'                    => 2208,
                            'CRUZ'                        => 2209,
                            'DEPUTADO IRAPUAN PINHEIRO'    => 2210,
                            'ERER�'                        => 2211,
                            'EUS�BIO'                    => 2212,
                            'FARIAS BRITO'                => 2213,
                            'FORQUILHA'                    => 2214,
                            'FORTALEZA'                    => 2215,
                            'FORTIM'                    => 2216,
                            'FRECHEIRINHA'                => 2217,
                            'GENERAL SAMPAIO'            => 2218,
                            'GRANJA'                    => 2219,
                            'GRANJEIRO'                    => 2220,
                            'GROA�RAS'                    => 2221,
                            'GUAI�BA'                    => 2222,
                            'GUARACIABA DO NORTE'        => 2223,
                            'GUARAMIRANGA'                => 2224,
                            'HIDROL�NDIA'                => 2225,
                            'HORIZONTE'                    => 2226,
                            'IBARETAMA'                    => 2227,
                            'IBIAPINA'                    => 2228,
                            'IBICUITINGA'                => 2229,
                            'ICAPU�'                    => 2230,
                            'IC�'                        => 2231,
                            'IGUATU'                    => 2232,
                            'INDEPEND�NCIA'                => 2233,
                            'IPAPORANGA'                => 2234,
                            'IPAUMIRIM'                    => 2235,
                            'IPU'                        => 2236,
                            'IPUEIRAS'                    => 2237,
                            'IRACEMA'                    => 2238,
                            'IRAU�UBA'                    => 2239,
                            'ITAI�ABA'                    => 2240,
                            'ITAITINGA'                    => 2241,
                            'ITAPAJ�'                    => 2242,
                            'ITAPIPOCA'                    => 2243,
                            'ITAPI�NA'                    => 2244,
                            'ITATIRA'                    => 2245,
                            'JAGUARETAMA'                => 2246,
                            'JAGUARIBARA'                => 2247,
                            'JAGUARIBE'                    => 2248,
                            'JAGUARUANA'                => 2249,
                            'JARDIM'                    => 2250,
                            'JATI'                        => 2251,
                            'JIJOCA DE JERICOACOARA'    => 2252,
                            'JUAZEIRO DO NORTE'            => 2253,
                            'JUC�S'                        => 2254,
                            'LAVRAS DA MANGABEIRA'        => 2255,
                            'LIMOEIRO DO NORTE'            => 2256,
                            'MADALENA'                    => 2257,
                            'MARACANA�'                    => 2258,
                            'MARANGUAPE'                => 2259,
                            'MARCO'                        => 2260,
                            'MARTIN�POLE'                => 2261,
                            'MASSAP�'                    => 2262,
                            'MAURITI'                    => 2263,
                            'MERUOCA'                    => 2264,
                            'MILAGRES'                    => 2265,
                            'MILH�'                        => 2266,
                            'MISS�O VELHA'                => 2267,
                            'MOMBA�A'                    => 2268,
                            'MONSENHOR TABOSA'            => 2269,
                            'MORADA NOVA'                => 2270,
                            'MORRINHOS'                    => 2271,
                            'MUCAMBO'                    => 2272,
                            'MULUNGU'                    => 2273,
                            'NOVA OLINDA'                => 2274,
                            'NOVA RUSSAS'                => 2275,
                            'NOVO ORIENTE'                => 2276,
                            'OCARA'                        => 2277,
                            'OR�S'                        => 2278,
                            'PACAJUS'                    => 2279,
                            'PACATUBA'                    => 2280,
                            'PACOTI'                    => 2281,
                            'PACUJ�'                    => 2282,
                            'PALHANO'                    => 2283,
                            'PALM�CIA'                    => 2284,
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
                            'QUITERIAN�POLIS'            => 2298,
                            'QUIXAD�'                    => 2299,
                            'QUIXEL�'                    => 2300,
                            'QUIXERAMOBIM'                => 2301,
                            'QUIXER�'                    => 2302,
                            'REDEN��O'                    => 2303,
                            'RUSSAS'                    => 2304,
                            'SALITRE'                    => 2305,
                            'SANTA QUIT�RIA'            => 2306,
                            'SANTANA DO ACARA�'            => 2307,
                            'SANTANA DO CARIRI'            => 2308,
                            'S�O BENEDITO'                => 2309,
                            'S�O GON�ALO DO AMARANTE'    => 2310,
                            'S�O JO�O DO JAGUARIBE'        => 2311,
                            'S�O LU�S DO CURU'            => 2312,
                            'SENADOR POMPEU'            => 2313,
                            'SENADOR S�'                => 2314,
                            'SOBRAL'                    => 2315,
                            'SOLON�POLE'                => 2316,
                            'TABULEIRO DO NORTE'        => 2317,
                            'TAMBORIL'                    => 2318,
                            'TARRAFAS'                    => 2319,
                            'TAU�'                        => 2320,
                            'TEJU�UOCA'                    => 2321,
                            'TIANGU�'                    => 2322,
                            'TRAIRI'                    => 2323,
                            'TURURU'                    => 2324,
                            'UBAJARA'                    => 2325,
                            'UMARI'                        => 2326,
                            'UMIRIM'                    => 2327,
                            'URUBURETAMA'                => 2328,
                            'URUOCA'                    => 2329,
                            'VARJOTA'                    => 2330,
                            'V�RZEA ALEGRE'                => 2331,
                            'VI�OSA DO CEAR�'            => 2332
                        ],
                        'inciso2' => [
                            [
                                'city' => 'ABAIARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ACARAPE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ACARA�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ACOPIARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'AIUABA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ALC�NTARAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ALTANEIRA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ALTO SANTO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'AMONTADA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ANTONINA DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'APUIAR�S',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'AQUIRAZ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARACATI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARACOIABA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARAREND�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARARIPE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARATUBA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ARNEIROZ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ASSAR�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'AURORA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BAIXIO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BANABUI�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BARBALHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BARRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BARROQUINHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BATURIT�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BEBERIBE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BELA CRUZ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BOA VIAGEM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'BREJO SANTO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CAMOCIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CAMPOS SALES',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CANIND�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CAPISTRANO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CARIR�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CARIRIA�U',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CARI�S',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CASCAVEL',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CATUNDA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CAUCAIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CEDRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CHAVAL',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CHOR�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CHOROZINHO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'COREA�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CRATE�S',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CRATO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CROAT�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'CRUZ',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'DEPUTADO IRAPUAN PINHEIRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ERER�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'EUS�BIO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FARIAS BRITO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FORQUILHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FORTALEZA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FORTIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'FRECHEIRINHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GENERAL SAMPAIO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GRANJA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GRANJEIRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GROA�RAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GUAI�BA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GUARACIABA DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'GUARAMIRANGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'HIDROL�NDIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'HORIZONTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IBARETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IBIAPINA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IBICUITINGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ICAPU�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IC�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IGUATU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'INDEPEND�NCIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IPAPORANGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IPAUMIRIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IPU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IPUEIRAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IRACEMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'IRAU�UBA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAI�ABA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAITINGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAPAJ�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAPIPOCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITAPI�NA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'ITATIRA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JAGUARETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JAGUARIBARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JAGUARIBE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JAGUARUANA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JARDIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JATI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JIJOCA DE JERICOACOARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JUAZEIRO DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'JUC�S',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'LAVRAS DA MANGABEIRA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'LIMOEIRO DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MADALENA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MARACANA�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MARANGUAPE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MARCO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MARTIN�POLE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MASSAP�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MAURITI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MERUOCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MILAGRES',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MILH�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MISS�O VELHA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MOMBA�A',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MONSENHOR TABOSA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MORADA NOVA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MORRINHOS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MUCAMBO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'MULUNGU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'NOVA OLINDA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'NOVA RUSSAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'NOVO ORIENTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'OCARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'OR�S',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PACAJUS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PACATUBA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PACOTI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PACUJ�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PALHANO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PALM�CIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PARACURU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PARAIPABA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PARAMOTI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PEDRA BRANCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PENAFORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PENTECOSTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PEREIRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PINDORETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PIQUET CARNEIRO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PORANGA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'PORTEIRAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'POTENGI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'POTIRETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUITERIAN�POLIS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUIXAD�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUIXEL�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUIXERAMOBIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'QUIXER�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'REDEN��O',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'RUSSAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SALITRE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SANTA QUIT�RIA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SANTANA DO ACARA�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SANTANA DO CARIRI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'S�O BENEDITO',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'S�O GON�ALO DO AMARANTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'S�O JO�O DO JAGUARIBE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'S�O LU�S DO CURU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SENADOR POMPEU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SENADOR S�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SOBRAL',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'SOLON�POLE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TABULEIRO DO NORTE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TAMBORIL',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TARRAFAS',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TAU�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TEJU�UOCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TIANGU�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TRAIRI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'TURURU',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'UBAJARA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'UMARI',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'UMIRIM',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'URUBURETAMA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'URUOCA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'VARJOTA',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'V�RZEA ALEGRE',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
                                'seal' => 2,
                                'status' => 0
                            ],
                            [
                                'city' => 'VI�OSA DO CEAR�',
                                'registrationFrom' => '2020-09-15',
                                'registrationTo' => '2020-10-15',
                                'shortDescription' => 'Inscri��o para o subs�dio mensal para manuten��o de espa�os art�sticos e culturais, microempresas e pequenas empresas culturais, cooperativas, institui��es e organiza��es culturais comunit�rias que tiveram as suas atividades interrompidas por for�a das medidas de isolamento social.',
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
                        // indica que s� deve exportar as inscri��es j� homologadas

                        'exportador_requer_homologacao' => false,

                        // indica que s� deve consolidar o resultado se a inscri��o
                        // j� tiver sido processada pelo SCGE
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

                        // indica que s� deve exportar as inscri��es j� homologadas
                        'exportador_requer_homologacao' => true,

                        // indica que a exporta��o n�o requer nenhuma valida��o
                        'exportador_requer_validacao' => [],

                        // indica que s� deve consolidar o resultado se a inscri��o
                        // j� tiver sido processada pelo Dataprev
                        'consolidacao_requer_validacoes' => ['dataprev'],

                        'inciso1' => [
                            // id do field do formul�rio 
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
                            // Op��es para �rea de atua��es culturais
                            'atuacoes-culturais' => [
                                'artes-cenicas' => [
                                    'Circo',
                                    'Dan�a',
                                    'Teatro',
                                    '�pera',
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
                                    'M�sica',
                                ],
                                'patrimonio-cultural' => [
                                    'Cultura Popular',
                                    'Gastronomia',
                                    'Outros',
                                    'Patrim�nio Cultural',
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
        /*	Esse m�dulo � para configurar a funcionalidade de den�ncia e/ou sugest�es */
        'module.CompliantSuggestion' => [
            'compliant' => false,
            'suggestion' => false
        ],

        // Token da API de Cep
        // Adquirido ao fazer cadastro em http://www.cepaberto.com/
        'cep.token' => '1a61e4d00bf9c6a85e3b696ef7014372',

        /* Modelo de configura��o para usar o id da cultura */
        //        'auth.provider' => 'OpauthOpenId',
        //        'auth.config' => [
        //            'login_url' => '',
        //            'logout_url' => '',
        //            'salt' => '',
        //            'timeout' => '24 hours'
        //        ],

        //Modelo de autentica��o para Login Cidad�o
        //        'auth.provider' => 'OpauthLoginCidadao',
        //        'auth.config' => array(
        //        'client_id' => '',
        //        'client_secret' => '',
        //        'auth_endpoint' => 'https://[SUA-URL]/openid/connect/authorize',
        //        'token_endpoint' => 'https://[SUA-URL]/openid/connect/token',
        //        'user_info_endpoint' => 'https://[SUA-URL]/api/v1/person.json'
        //        ),


        //'auth.provider' => 'Fake',
        //configura��o de provedores Auth para Login 
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
