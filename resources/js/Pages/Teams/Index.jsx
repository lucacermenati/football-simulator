import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router } from "@inertiajs/react";
import TeamTable from "./Components/TeamTable";
import { useState } from "react";

import Pagination from "@/Components/Pagination";
import Searchbar from "@/Components/Searchbar";
import Modal from "@/Components/Modal";
import TeamEdit from "./Components/TeamEdit";
import TeamDelete from "./Components/TeamDelete";
import TeamAdd from "./Components/TeamAdd";

export default function TeamsIndex({ teams, availableCompetitions }) {
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isAddModalOpen, setIsAddModalOpen] = useState(false);
    const [selectedTeam, setSelectedTeam] = useState(null);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Teams
                </h2>
            }
        >
            <Head title="Teams" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center mt-2 mb-6">
                        <Searchbar
                            onSearch={(search) => {
                                router.get(
                                    route("teams.index"),
                                    {
                                        search: search,
                                    },
                                    {
                                        preserveState: true,
                                        preserveScroll: true,
                                    },
                                );
                            }}
                        />
                        <div className="grid grid-cols-2 gap-4">
                            <PrimaryButton
                                className="self-start"
                                onClick={() => {
                                    console.log("Create team clicked");
                                }}
                            >
                                Create Team
                            </PrimaryButton>
                            <PrimaryButton
                                className="self-start"
                                onClick={() => {
                                    console.log("Generate teams clicked");
                                }}
                            >
                                Generate Teams
                            </PrimaryButton>
                        </div>
                    </div>
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            {teams.data.length > 0 ? (
                                <TeamTable
                                    teams={teams.data}
                                    actions={[
                                        {
                                            icon: "view",
                                            onClick: (team) => {
                                                router.visit(
                                                    route(
                                                        "teams.show",
                                                        team.id,
                                                    ),
                                                );
                                            },
                                        },
                                        {
                                            icon: "edit",
                                            onClick: (team) => {
                                                setSelectedTeam(team);
                                                setIsEditModalOpen(true);
                                            },
                                        },
                                        {
                                            icon: "add",
                                            onClick: (team) => {
                                                router.reload({
                                                    only: [
                                                        "availableCompetitions",
                                                    ],
                                                    data: {
                                                        selected_team_id:
                                                            team.id,
                                                    },
                                                });
                                                setSelectedTeam(team);
                                                setIsAddModalOpen(true);
                                            },
                                        },
                                        {
                                            icon: "delete",
                                            onClick: (team) => {
                                                setSelectedTeam(team);
                                                setIsDeleteModalOpen(true);
                                            },
                                        },
                                    ]}
                                />
                            ) : (
                                <div>
                                    <h1 className="mb-4 text-xl font-semibold">
                                        Your world needs its first team
                                    </h1>
                                    <p>
                                        There are no teams in your universe yet.
                                        Create one from scratch and shape its
                                        identity, or let the factory generate a
                                        team for you to get started quickly.
                                    </p>
                                </div>
                            )}
                        </div>
                    </div>
                    <Pagination links={teams.links} meta={teams.meta} />
                </div>
            </div>
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
                <TeamAdd
                    team={selectedTeam}
                    availableCompetitions={availableCompetitions}
                    onSuccess={() => {
                        setIsAddModalOpen(false);
                        setSelectedTeam(null);
                    }}
                    onCancel={() => {
                        setIsAddModalOpen(false);
                        setSelectedTeam(null);
                    }}
                />
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
        </AuthenticatedLayout>
    );
}
