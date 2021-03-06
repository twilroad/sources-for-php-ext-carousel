<?php
/**
 * The file is part of Notadd
 *
 * @author: Hollydan<2642956839@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime: 17-9-29 上午11:03
 */

namespace Notadd\Carousel\Handlers;

use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Notadd\Carousel\Models\Picture;
use Notadd\Foundation\Routing\Abstracts\Handler;

class DeletePictureHandler extends Handler
{

    protected $file;

    /**
     * DeletePictureHandler constructor.
     * @param Container $container
     * @param Filesystem $filesystem
     */
    public function __construct(Container $container, Filesystem $filesystem)
    {
        parent::__construct($container);
        $this->file = $filesystem;
    }

    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    protected function execute()
    {
        $this->validate($this->request, [
            'picture_id' => 'required',
        ], [
            'picture_id.required' => '请传入图片id',
        ]);

        $picture = Picture::find($this->request->get('picture_id'));
        if (!$picture instanceof Picture) {
            return $this->withCode(401)->withError('图片id不存在');
        }
        $filePath = strstr($picture->path, '/uploads');
        $complatePath = base_path('public' . $filePath);
        if ($this->file->exists($complatePath)) {
            $this->file->delete($complatePath);
        }
        if ($picture->delete()) {
            return $this->withCode(200)->withMessage('删除图片信息成功');
        }
    }
}