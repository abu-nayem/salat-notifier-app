<?php

namespace SalatNotifier\Interfaces;

interface SalatTimeManagerInterface
{
    public function all();
    public function store(array $data);
    public function findById($id);
    public function update($id, array $data);
    public function delete($id);
}
