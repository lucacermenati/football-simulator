import Edit from "@/Icons/Edit";
import PlusCircle from "@/Icons/PlusCircle";
import Trash from "@/Icons/Trash";
import View from "@/Icons/View";
import TeamLogo from "./TeamLogo";
import { Link } from "@inertiajs/react";
import { useState } from "react";
import Modal from "@/Components/Modal";
import TeamDelete from "./TeamDelete";
import TeamEdit from "./TeamEdit";

export default function TeamTable({ teams }) {
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isAddModalOpen, setIsAddModalOpen] = useState(false);
    const [selectedTeam, setSelectedTeam] = useState(null);

    return (
        <div className="grid grid-cols-2">
            {teams.map((team) => (
                <div key={team.id} className="grid grid-cols-2 gap-12 p-3">
                    <div className="flex items-center space-x-4">
                        <TeamLogo team={team} className="w-8 h-8" />
                        <Link
                            className="font-medium whitespace-nowrap hover:underline"
                            href={route("teams.show", {
                                team: team.id,
                            })}
                        >
                            <span>{team.name}</span>
                        </Link>
                    </div>

                    <div className="flex space-x-4">
                        <Link
                            href={route("teams.show", {
                                team: team.id,
                            })}
                        >
                            <View
                                title="View"
                                className="w-6 h-6 text-primaryRed-800"
                            />
                        </Link>
                        <Edit
                            title="Edit"
                            className="w-6 h-6 cursor-pointer text-primaryRed-800"
                            onClick={() => {
                                setIsEditModalOpen(true);
                                setSelectedTeam(team);
                            }}
                        />
                        <PlusCircle
                            title="Add to a competition"
                            className="w-6 h-6 cursor-pointer text-primaryRed-800"
                            onClick={() => {
                                setIsAddModalOpen(true);
                                setSelectedTeam(team);
                            }}
                        />
                        <Trash
                            title="Delete"
                            className="w-6 h-6 cursor-pointer text-primaryRed-800"
                            onClick={() => {
                                setIsDeleteModalOpen(true);
                                setSelectedTeam(team);
                            }}
                        />
                    </div>
                </div>
            ))}
            <Modal
                show={isEditModalOpen}
                onClose={() => {
                    setIsEditModalOpen(false);
                    setSelectedTeam(null);
                }}
            >
                <TeamEdit
                    team={selectedTeam}
                    onCancel={() => setIsEditModalOpen(false)}
                    onSuccess={() => setIsEditModalOpen(false)}
                />
            </Modal>
            <Modal
                show={isAddModalOpen}
                onClose={() => {
                    setIsAddModalOpen(false);
                    setSelectedTeam(null);
                }}
            >
                Add to competition modal content
            </Modal>
            <Modal
                show={isDeleteModalOpen}
                onClose={() => {
                    setIsDeleteModalOpen(false);
                    setSelectedTeam(null);
                }}
            >
                <TeamDelete
                    team={selectedTeam}
                    onCancel={() => setIsDeleteModalOpen(false)}
                />
            </Modal>
        </div>
    );
}
