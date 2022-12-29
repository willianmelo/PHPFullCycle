<?php

namespace Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testAttributes()
    {
        $category = new Category(
            name: 'New Cat',
            description: 'New desc'
        );

        $this->assertEquals('New Cat',$category->name);
        $this->assertEquals('New desc',$category->description);
        $this->assertEquals(true, $category->isActive);
    }

    public function testeActivated()
    {
        $category = new Category(
            name: 'New Cat',
            description: 'new description',
            isActive: false
        );

        $this->assertFalse($category->isActive);

        $category->activate();

        $this->assertTrue($category->isActive);
    }

    public function testDisabled()
    {
        $category = new Category(name: 'New name',description: 'new description');

        $category->disable();

        $this->assertFalse($category->isActive);
    }

    public function testUpdate()
    {
        $uuid= 'uiid.value';

        $category = new Category(
            name: 'New Cat',
            id: $uuid,
            description: 'New desc'
        );

        $category->update(
            name: 'new_name',
            description: 'new_desc'
        );

        $this->assertEquals('new_name',$category->name);
        $this->assertEquals('new_desc',$category->description);
    }

    public function testExceptionName()
    {
        try
        {
            $category = new Category(name: 't', description: 'N');

            $this->fail();
        }catch(\Exception $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }
}