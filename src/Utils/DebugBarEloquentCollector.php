<?php namespace App\Utils;

class DebugBarEloquentCollector extends \DebugBar\DataCollector\PDO\PDOCollector
{
    protected $capsule;

    public function __construct($capsule)
    {
        $this->capsule = $capsule;

        parent::__construct();
        $this->addConnection($this->getTraceablePdo(), 'Eloquent PDO');
    }

    /**
     * @return Illuminate\Database\Capsule\Manager;
     */
    protected function getEloquentCapsule() {
        return $this->capsule;
    }

    /**
     * @return PDO
     */
    protected function getEloquentPdo() {
        return $this->getEloquentCapsule()->connection()->getPdo();
    }

    /**
     * @return \DebugBar\DataCollector\PDO\TraceablePDO
     */
    protected function getTraceablePdo() {
        return new \DebugBar\DataCollector\PDO\TraceablePDO($this->getEloquentPdo());
    }

    // Override
    public function getName() {
        return "eloquent_pdo";
    }

    // Override
    public function getWidgets()
    {
        return array(
            "eloquent" => array(
                "icon"    => "inbox",
                "widget"  => "PhpDebugBar.Widgets.SQLQueriesWidget",
                "map"     => "eloquent_pdo",
                "default" => "[]"
            ),
            "eloquent:badge" => array(
                "map"     => "eloquent_pdo.nb_statements",
                "default" => 0
            )
        );
    }
}
