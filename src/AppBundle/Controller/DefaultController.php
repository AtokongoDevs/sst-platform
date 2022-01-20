<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Area;
use AppBundle\Entity\Cargo;
use AppBundle\Entity\DetalleUsuario;
use AppBundle\Entity\Empresa;
use AppBundle\Entity\Eventualidad;
use AppBundle\Entity\Gerencia;
use AppBundle\Entity\Sede;
use AppBundle\Entity\Status;
use AppBundle\Entity\TipoEventualidad;
use AppBundle\Entity\Usuario;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage",methods={"POST"})
     * @throws Exception
     */
    public function indexAction(Request $request)
    {
        $data = json_decode($request->getContent(),1);
        $entityManager = $this -> getDoctrine() -> getManager();

        $empresa = $entityManager->find("AppBundle:Empresa",$data['id_empresa']);
        if(!$empresa){
            return new JsonResponse(['msg'=>'Empresa no existe'],404);
        }

        $detalleUsuario = new DetalleUsuario();
        $detalleUsuario->setNombre($data['nombre']);
        $detalleUsuario->setApellido($data['apellido']);
        $detalleUsuario->setCreatedAt();
        $detalleUsuario->setUpdatedAt();
        $detalleUsuario->setEmpresa($empresa);

        $usuario = new Usuario();
        $usuario->setUsername($data['username']);
        $usuario->setPassword($data['password']);
        $usuario->setDetalleUsuario($detalleUsuario);
        $detalleUsuario->setUsuario($usuario);

        $entityManager->persist($usuario);
        $entityManager->persist($detalleUsuario);
        $entityManager->flush();
        return new JsonResponse(['msg'=>'OK'],200);
    }
    /**
     * @Route ("/get",methods={"GET"})
     */
    public function getAction(Request $request){
        $data = json_decode($request->getContent(),1);
        $entityManager = $this -> getDoctrine() -> getManager();
        $detalleUsuario = $entityManager->find('AppBundle:DetalleUsuario',$data['id']);
        if($detalleUsuario === null){
            return new JsonResponse(['msg'=>'No encontrado'],404);
        }
        return new JsonResponse([
            'id'=>$detalleUsuario->getId(),
            'nombre'=>$detalleUsuario->getNombre(),
            'apellido'=>$detalleUsuario->getApellido(),
            'created_ad'=>$detalleUsuario->getCreatedAt(),
            'username'=>$detalleUsuario->getUsuario()->getUsername(),
            'password'=>$detalleUsuario->getUsuario()->getPassword()],200);
    }
    /**
     * @Route ("/update",methods={"PUT"})
     */
    public function updateAction(Request $request){
        $data = json_decode($request->getContent(),1);
        $entityManager = $this -> getDoctrine() -> getManager();
        $detalleUsuario = $entityManager->find('AppBundle:DetalleUsuario',$data['id']);
        if($detalleUsuario === null){
            return new JsonResponse(['msg'=>'No encontrado'],404);
        }
        $detalleUsuario->setNombre($data['nombre']);
        $entityManager->flush();
        return new JsonResponse(['msg'=>'Ok'],200);
    }

    /**
     * @Route ("/empresa/create",methods={"POST"})
     * @throws Exception
     */
    public function createEmpresaAction(Request $request){
        $data = json_decode($request->getContent(),1); //Obtenemos la data y la convertimos a un array

        $entityManager = $this -> getDoctrine() -> getManager();

        //Creación de objeto Empresa con los datos dentro del array
        $empresa = new Empresa();
        $empresa->setDireccionFiscal($data['direccion_fiscal']);
        $empresa->setRazonSocial($data['razon_social']);
        $empresa->setRuc($data['ruc']);
        $empresa->setNombreComercial($data['nombre_comercial']);
        try{
            $empresa->setCreatedAt();
            $empresa->setUpdatedAt();
        }catch(Exception $exception) {
            return new JsonResponse([
                'msg' => 'Error con la asignación de fecha',
                'exception'=>$exception->getMessage()], 505);
        }

        $entityManager->persist($empresa);
        $entityManager->flush();

        return new JsonResponse(['msg'=>'Empresa creada con éxito'],500);
    }
    /**
     * @Route ("/status/create",methods={"POST"})
     */
    public function createStatusAction(Request $request){
        $data = json_decode($request->getContent(),1); //Obtenemos la data y la convertimos a un array

        $entityManager = $this -> getDoctrine() -> getManager();

        //Creación de objeto Status con los datos dentro del array
        $status = new Status();
        $status->setDescripcion($data['descripcion']);

        $entityManager->persist($status);
        $entityManager->flush();

        return new JsonResponse(['msg'=>'Status creado con éxito'],201);
    }

    /**
     * @Route ("/tipoeventualidad/create",methods={"POST"})
     */
    public function createTipoEventualidadAction(Request $request){
        $data = json_decode($request->getContent(),1); //Obtenemos la data y la convertimos a un array

        $entityManager = $this -> getDoctrine() -> getManager();

        //Creación de objeto Status con los datos dentro del array
        $tipoEventualidad = new TipoEventualidad();
        $tipoEventualidad->setDescripcion($data['descripcion']);

        $entityManager->persist($tipoEventualidad);
        $entityManager->flush();

        return new JsonResponse(['msg'=>'Tipo de Eventualidad creada con éxito'],201);
    }

    /**
     * @Route ("/sede/create",methods={"POST"})
     */
    public function createSedeAction(Request $request){
        $data = json_decode($request->getContent(),1); //Obtenemos la data y la convertimos a un array

        $entityManager = $this -> getDoctrine() -> getManager();

        //Creación de objeto Status con los datos dentro del array
        $sede = new Sede();
        $sede->setDescripcion($data['descripcion']);

        $entityManager->persist($sede);
        $entityManager->flush();

        return new JsonResponse(['msg'=>'Sede creada con éxito'],201);
    }

    /**
     * @Route ("/cargo/create",methods={"POST"})
     */
    public function createCargoAction(Request $request){
        $data = json_decode($request->getContent(),1); //Obtenemos la data y la convertimos a un array

        $entityManager = $this -> getDoctrine() -> getManager();

        //Creación de objeto Status con los datos dentro del array
        $cargo = new Cargo();
        $cargo->setDescripcion($data['descripcion']);

        $entityManager->persist($cargo);
        $entityManager->flush();

        return new JsonResponse(['msg'=>'Cargo creado con éxito'],201);
    }

    /**
     * @Route ("/gerencia/create",methods={"POST"})
     */
    public function createGerenciaAction(Request $request){
        $data = json_decode($request->getContent(),1); //Obtenemos la data y la convertimos a un array

        $entityManager = $this -> getDoctrine() -> getManager();

        //Creación de objeto Status con los datos dentro del array
        $gerencia = new Gerencia();
        $gerencia->setDescripcion($data['descripcion']);

        $entityManager->persist($gerencia);
        $entityManager->flush();

        return new JsonResponse(['msg'=>'Cargo creado con éxito'],201);
    }

    /**
     * @Route ("/area/create",methods={"POST"})
     */
    public function createAreaAction(Request $request){
        $data = json_decode($request->getContent(),1); //Obtenemos la data y la convertimos a un array

        $entityManager = $this -> getDoctrine() -> getManager();

        $gerenciaRepository = $this -> getDoctrine() -> getRepository('AppBundle:Gerencia');
        $gerencia = $gerenciaRepository->find($data['gerencia_id']);


        //Creación de objeto Status con los datos dentro del array
        $area = new Area();
        $area->setDescripcion($data['descripcion']);
        $area->setGerencia();
        $entityManager->persist($gerencia);
        $entityManager->flush();

        return new JsonResponse(['msg'=>'Cargo creado con éxito'],201);
    }

    /**
     * @Route ("/colaborador/create",methods={"POST"})
     */
    public function createColaboradorAction(Request $request){
        //
        return new JsonResponse(['msg'=>'Sin implementar'],404);
    }

    /**
     * @Route ("/eventualidad/create",methods={"POST"})
     */
    public function createEventualidadAction(Request $request){
        $data = json_decode($request->getContent(),1);
        $manager = $this->getDoctrine()->getManager();
        $repository_empresa = $this->getDoctrine()->getRepository('AppBundle:Empresa');
        $empresa = $repository_empresa->find($data['id_empresa']);
        if(!$empresa){
            return new JsonResponse(['msg'=>'Empresa no encontrada']);
        }
        $repository_area = $this->getDoctrine()->getRepository('AppBundle:Area');
        $area = $repository_area->find($data['id_area']);
        $repository_gerencia = $this->getDoctrine()->getRepository('AppBundle:Gerencia');
        $gerencia = $repository_area->find($data['id_gerencia']);
        $repository_cargo = $this->getDoctrine()->getRepository('AppBundle:Cargo');
        $cargo = $repository_area->find($data['id_cargo']);
        $repository_sede = $this->getDoctrine()->getRepository('AppBundle:Cargo');
        $sede = $repository_area->find($data['id_sede']);
        $repository_tipo_eventualidad = $this->getDoctrine()->getRepository('AppBundle:TipoEventualidad');
        $tipo_eventualidad = $repository_area->find($data['id_tipo_eventualidad']);
        $repository_status = $this->getDoctrine()->getRepository('AppBundle:Status');
        $status = $repository_area->find($data['id_status']);
        $repository_colaborador = $this->getDoctrine()->getRepository('AppBundle:Colaborador');
        $colaborador = $repository_colaborador->find($data['id_colaborador']);

        $eventualidad = new Eventualidad();
        $eventualidad->setLugarAccidente($data['lugar_accidente']);
        $eventualidad->setParteAfectada($data['parte_afectada']);
        $eventualidad->setLadoAfectado($data['lado_afectado']);
        $eventualidad->setDescripcion($data['descripcion']);
        $eventualidad->setMedidas($data['medidas']);
        $eventualidad->setCreatedAt();
        $eventualidad->setUpdatedAt();
        $eventualidad->setColaborador($colaborador);
        $eventualidad->setStatus($status);
        $eventualidad->setTipo($tipo_eventualidad);

        $manager->persist($eventualidad);
        $manager->flush();

        return new JsonResponse(['msg'=>'Eventualidad Creada con Exito'],201);
    }
}
