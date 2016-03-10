<?php namespace Sintattica\Atk\Db\Statement;

use \Iterator;

/**
 * External iterator for a statement.
 */
class StatementIterator implements Iterator
{
    /**
     * Current row.
     *
     * @var mixed
     */
    private $m_row = false;

    /**
     * Current position.
     *
     * @var int
     */
    private $m_position = false;

    /**
     * Statement object.
     *
     * @var Statement
     */
    private $m_statement;

    /**
     * Constructs a new statemen iterator.
     *
     * @param Statement $statement statement
     */
    public function __construct(Statement $statement)
    {
        $this->m_statement = $statement;
    }

    /**
     * Returns the statement for this iterator.
     *
     * @return Statement statement
     */
    public function getStatement()
    {
        return $this->m_statement;
    }

    /**
     * Rewind the iterator.
     */
    public function rewind()
    {
        $this->getStatement()->rewind();
        $this->m_position = 0;
        $this->m_row = $this->getStatement()->fetch();
    }

    /**
     * Returns the current row.
     */
    public function current()
    {
        return $this->m_row;
    }

    /**
     * Returns the current offset.
     */
    public function key()
    {
        return $this->valid() ? $this->m_position : false;
    }

    /**
     * Go to the next row.
     */
    public function next()
    {
        $this->m_position++;
        $this->m_row = $this->getStatement()->fetch();
    }

    /**
     * Iterator valid?
     */
    public function valid()
    {
        return $this->m_row != false;
    }
}
